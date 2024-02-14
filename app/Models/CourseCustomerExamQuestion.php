<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCustomerExamQuestion extends Model
{
    use HasFactory;
    protected $table = 'course_customer_exam_questions';
    protected $fillable = [
        'course_customer_exam_id' ,
        'question_id'
        ,'last_updated_by',
    ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_customer_exam()
    {
        return $this->belongsTo(CourseCustomerExam::class, 'course_customer_exam_id', 'id');
    }
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
    public function course_customer_exam_answers()
    {
        return $this->hasMany(CourseCustomerExamAnswer::class, 'course_customer_exam_question_id', 'id');
    }
    public function childs()
    {
        return CourseCustomerExamQuestion::whereNotNull('child_question_id')
        ->where('course_customer_exam_id',$this->course_customer_exam_id)->where('question_id',$this->question_id)->get();
    }

    public function child_question()
    {
        return $this->belongsTo(Question::class, 'child_question_id', 'id');
    }
}
