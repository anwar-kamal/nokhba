<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCustomer extends Model
{
    use HasFactory;
    protected $table = 'course_customers';
    protected $fillable = [
        'order_detail_id' ,'customer_id',
        'course_id' ,'status' ,'last_updated_by',
        'degree' ,'comment','confirmation'
    ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_detail_id', 'id');
    }

    public function course_customer_evaluations()
    {
        return $this->hasMany(CourseCustomerEvaluation::class, 'course_customer_id', 'id');
    }
    public function course_customer_attendances()
    {
        return $this->hasMany(CourseCustomerAttendance::class, 'course_customer_id', 'id');
    }
    public function course_customer_exams(){
        return $this->hasMany(CourseCustomerExam::class, 'course_customer_id', 'id');
    }

    public function getGradeEn()
    {
        if ($this->degree >= .60 && $this->degree <= .70){
            return "Acceptable";
        }elseif ($this->degree > .70 && $this->degree <= .80){
            return "Good";
        }elseif ($this->degree > .80 && $this->degree <= .90){
            return "Very Good";
        }elseif ($this->degree > .90){
            return "Excellent";
        }else{
            return 'Field';
        }
    }
    public function getGradeAr()
    {
        if ($this->degree >= .60 && $this->degree <= .70){
            return "مقبول";
        }elseif ($this->degree > .70 && $this->degree <= .80){
            return "جيد";
        }elseif ($this->degree > .80 && $this->degree <= .90){
            return "جيد جداً";
        }elseif ($this->degree > .90){
            return "امتياز";
        }else{
            return 'راسب';
        }
    }
}
