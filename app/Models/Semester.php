<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    public function diploma()
    {
        return $this->belongsTo(Product::class, 'diploma_id', 'id');
    }

    public function semester_products()
    {
        return $this->hasMany(SemesterProduct::class, 'semester_id', 'id');
    }

    public function semester_customers()
    {
        return $this->hasMany(SemesterCustomer::class, 'semester_id', 'id');
    }

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'semester_id', 'id');
    }
}
