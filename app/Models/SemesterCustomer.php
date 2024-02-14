<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterCustomer extends Model
{
    use HasFactory;

    public function diploma()
    {
        return $this->belongsTo(Product::class );
    }
    public function order_detail() // for deploma
    {
        return $this->belongsTo(OrderDetail::class);
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function register_by_user()
    {
        return $this->belongsTo(User::class, 'register_by', 'id');
    }
    public function customer_semester_products()
    {
        return $this->hasMany(CustomerSemesterProduct::class, 'semester_customer_id', 'id');
    }
    public function order_details()
    {
        return $this->morphMany(OrderDetail::class, 'item');
    }

}
