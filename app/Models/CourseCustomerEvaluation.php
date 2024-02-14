<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCustomerEvaluation extends Model
{
    use HasFactory;
    protected $table = 'course_customer_evaluations';
    protected $fillable = [
        'course_level_evaluation_type_id' ,'course_customer_id',
        'last_updated_by' ,'score',
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_level_evaluation_type()
    {
        return $this->belongsTo(CourseLevelEvaluationType::class, 'course_level_evaluation_type_id', 'id');
    }
    public function course_customer()
    {
        return $this->belongsTo(CourseCustomer::class, 'course_customer_id', 'id');
    }


}
