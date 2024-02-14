<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;
    protected $table = 'course_types';
    protected $fillable = ['name' ,'last_updated_by' ,'comment'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_type_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
