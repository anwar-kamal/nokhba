<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthHistory extends Model
{
    use HasFactory;
    protected $table ='auth_history';

    public function created_by_user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
