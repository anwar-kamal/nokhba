<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadCustomerAssignHistory extends Model
{
    use HasFactory;

    public function assigned_by_user()
    {
        return $this->belongsTo(User::class , 'assigned_by','id');
    }
    public function assigned_to_user()
    {
        return $this->belongsTo(User::class , 'assigned_to','id');
    }

}
