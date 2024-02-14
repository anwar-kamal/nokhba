<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterProduct extends Model
{
    use HasFactory;

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id', 'id');
    }
}
