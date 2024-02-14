<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadRelatedCustomer extends Model
{
    use HasFactory;

    public function lead_customer(){
        return $this->belongsTo(LeadCustomer::class ,"lead_customer_id" ,"id");
    }
    public function customer(){
        return $this->belongsTo(Customer::class ,"customer_id" ,"id");
    }
}
