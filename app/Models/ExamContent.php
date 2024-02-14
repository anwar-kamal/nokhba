<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamContent extends Model
{
    use HasFactory;
    protected $table = 'exam_contents';
    protected $fillable = [
        'exam_id' ,'course_level_id',
        'questions_count' ,'pass_percent',
        'last_updated_by' ,'comment' ,
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_level()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id', 'id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
}
