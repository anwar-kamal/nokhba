<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentPackageProduct extends Model
{
    use HasFactory;

    protected $table = 'installment_package_products';

    protected $fillable = [
        'installment_package_id'  ,'last_updated_by' ,'product_id'
        ,'original_price' , 'discount_price',
    ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function installment_package()
    {
        return $this->belongsTo(InstallmentPackage::class, 'installment_package_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function order_details()
    {
        return $this->morphMany(OrderDetail::class, 'item');
    }
    public function getStartDateAttribute($value) {
        return Carbon::parse($value) ;
    }
    public function getEndDateAttribute($value) {
        return Carbon::parse($value) ;
    }
}
