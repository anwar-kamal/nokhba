<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    use HasFactory;

    protected $table = 'course_levels';
    protected $fillable = [
            'name' , 'comment','level_order',
            'active','activate_tax',
            'product_id','last_updated_by',
            'hours'  ,'static_fees',
            'pass_score'  ,
        ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function order_detials(){
        return $this->hasMany(OrderDetail::class ,"course_level_id" ,"id");
    }
    public function instructors()
    {
        return $this->belongsToMany(User::class, InstructorCourseLevel::class,'course_level_id','instructor_id','id','id');
    }
    public function course_level_evaluation_types()
    {
        return $this->hasMany(CourseLevelEvaluationType::class, 'course_level_id', 'id');
    }
    public function exams()
    {
        return $this->hasMany(Exam::class, 'course_level_id', 'id');
    }

    public function getNameAttribute() {
        if ( App::getLocale() =="en"){
            return ucfirst($this->name_en) ;
        }else{
            return $this->name_ar;
        }
    }
}
