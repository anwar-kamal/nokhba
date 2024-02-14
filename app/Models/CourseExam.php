<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseExam extends Model
{
    use HasFactory;
    protected $table = 'course_exams';
    protected $fillable = [
        'exam_id', 'course_id', 'last_updated_by',
         'comment',
    ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
    public function course_customer_exams()
    {
        return $this->hasMany(CourseCustomerExam::class, 'course_exam_id', 'id');
    }

}
