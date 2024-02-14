<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCustomerExamAnswer extends Model
{
    use HasFactory;
    protected $table = 'course_customer_exam_answers';
    protected $fillable = [
        'course_customer_exam_question_id',
        'answer_id' ,'customer_answer' ,'answer_time_per_seconds'
        ,'last_updated_by',
    ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_customer_exam_question()
    {
        return $this->belongsTo(CourseCustomerExamQuestion::class, 'course_customer_exam_question_id', 'id');
    }
    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }
}
