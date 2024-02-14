<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Traits\HasCompanyTrait;

class OrderDetail extends Model
{
    use HasFactory;
    use HasCompanyTrait;


    protected $table = 'order_details';
    protected $fillable = [
            'order_id' ,
            // product_id , offer_product , package_product , installment_package_product
            'item_id' ,'item_type',
            'price', 'price_with_tax','course_level_id',
            'tax' , 'accounting_code',
            'status','customer_id','branch_id',
            'last_updated_by' , 'comment' ,'period_id'
        ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function course_level()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function course_customers(){
        return $this->hasMany(CourseCustomer::class , 'order_detail_id' , 'id');
    }

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function item()
    {
        return $this->morphTo();
    }
    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id', 'id');
    }

}
