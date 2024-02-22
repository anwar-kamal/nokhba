<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCustomerExamEvaluation extends Model
{
    use HasFactory;

    protected $table = 'course_customer_exam_evaluation';


    public function course_customer_exam() {

        return $this->belongsTo(CourseCustomerExam::class, 'cc_exam_id', 'id');

    }
}
