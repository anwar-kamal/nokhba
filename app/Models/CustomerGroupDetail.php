<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGroupDetail extends Model
{
    use HasFactory;

    protected $table = 'customer_group_details';
    protected $fillable = [
            'customer_group_id' , 'customer_id',
            'last_updated_by',
             'comment',
        ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function customer_group()
    {
        return $this->belongsTo(CustomerGroup::class, 'customer_group_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

}
