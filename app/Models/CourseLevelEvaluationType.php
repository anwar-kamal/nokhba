<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLevelEvaluationType extends Model
{
    use HasFactory;
    protected $table = 'course_level_evaluation_types';
    protected $fillable = [
        'pass_percent' ,'course_level_id',
        'evaluation_type_id' ,'last_updated_by',
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_level()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id', 'id');
    }
    public function evaluation_type()
    {
        return $this->belongsTo(EvaluationType::class, 'evaluation_type_id', 'id');
    }

}
