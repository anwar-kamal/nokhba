<?php

namespace App\Models;

use App\Models\Traits\HasCompanyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentPackage extends Model
{
    use HasFactory;
    use HasCompanyTrait;

    protected $table = 'installment_packages';
    protected $fillable = [
        'name'  ,'last_updated_by' ,'comment', 'installment_count',
        'start_date'  ,'end_date' ,'total_amount' ,'activate' ,
        'deposit_amount'  ,'installment_amount' ,'every_month'
        ,'currency_id',
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function installment_package_products()
    {
        return $this->hasMany(InstallmentPackageProduct::class, 'installment_package_id', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, InstallmentPackageProduct::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
    public function order_installments(){
        return $this->hasMany(OrderInstallment::class, 'installment_package_id', 'id');
    }

    public function model_display_in()
    {
        return $this->morphMany(ModelDisplayIn::class, 'model');
    }

    public function price_with_tax($col = 'deposit_amount'){

        $product = $this->products()->first();
        $product_price = $product->product_prices()->where("currency_id" , 1 )->first();

        if ($product_price->activate_tax && $product->taxes()->count()>0) {
             $first_tax = $product->taxes()->first();
            if ($first_tax ){
                 $pack_item_tax_ratio = $first_tax ->tax_type->ratio;
            }else{
                $pack_item_tax_ratio =0;
            }

            return ($this->$col +  ($pack_item_tax_ratio * $this->installment_package_products()->first()->discount_price / ($this->installment_count +1)));

        }

        return $this->$col;
    }

    public function calc_total_amount(){
        $total_amount = 0;
        foreach ($this->installment_package_products as $i => $package_product) {

            $product_price =$package_product->product->product_prices()->where("currency_id" , 1 )->first();

            $first_tax = $package_product->product->taxes()->first();
            $pack_item_tax_ratio =  ($first_tax ) ? $first_tax->tax_type->ratio : 0;


            if (  $this->include_tax){
                $pack_item_price_with_tax =$package_product->discount_price;
                $total_amount +=  $pack_item_price_with_tax ;
            }
            elseif ($product_price->activate_tax && $package_product->product->taxes()->count()>0) {
                $pack_item_price_with_tax =(($package_product->discount_price ) * ($pack_item_tax_ratio +1) );
                $total_amount +=  $pack_item_price_with_tax ;

            }else{
                $pack_item_price_with_tax = $package_product->discount_price ;
                $total_amount +=  $pack_item_price_with_tax ;
            }

            return $total_amount;
        }
    }

}
