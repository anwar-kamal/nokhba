<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageProduct extends Model
{
    use HasFactory;

    protected $table = 'package_products';
    protected $fillable = [
        'original_price','discount_price','tax_ratio',
        'package_id'  ,'last_updated_by' ,'product_id'
    ];
    protected $hidden = ['company_id'];

    // company_id
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function order_details()
    {
        return $this->morphMany(OrderDetail::class, 'item');
    }
}
