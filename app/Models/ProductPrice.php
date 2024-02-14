<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $table = 'product_prices';
    protected $fillable = [
        'product_id' , 'currency_id','price',
        'activate_tax','last_updated_by','comment',
    ];
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(ProductPrice::class, 'product_price_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function price_with_tax(){
        //return ($this->price_after_tax) ?? $this->price;
         return $this->price;
    }

}
