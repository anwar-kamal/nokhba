<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['start_date' ,'end_date',
     'from' ,'to' ,'gender',
     'capacity' ,'initial_cost_per_hour' ,'total_cost_per_hour',
     'active' ,'course_status_id' ,'instructor_id',
     'course_level_id' ,'class_room_id' ,
     'last_updated_by' ,'comment' ,'sessions_count',
     'sat','sun','mon','tue','wed','thu','fri','course_type_id','schedule_period_id'
    ];

    public function course_status()
    {
        return $this->belongsTo(CourseStatus::class, 'course_status_id', 'id');
    }
    public function course_type()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }
    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id', 'id');
    }
    public function course_level()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id', 'id');
    }
    public function course_customers()
    {
        return $this->hasMany(CourseCustomer::class, 'course_id', 'id');
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class , CourseCustomer::class);
    }
    public function course_sessions()
    {
        return $this->hasMany(CourseSession::class, 'course_id', 'id');
    }
    public function course_branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function course_exams(){
        return $this->hasMany(CourseExam::class,'course_id','id');
    }
    public function course_surveys(){
        return $this->hasMany(CourseSurvey::class,'course_id','id');
    }

    public function getInfoAttribute() {
        return  $this->course_level->name;
    }
    public function getDetailsAttribute() {
        return  $this->course_level->product->name .":". $this->course_level->name . "
" . (($this->class_room_id)? $this->class_room->name ."
":"" ). (($this->instructor_id)? $this->instructor->name ."
":"");
    }

    public function schedule_period()
    {
        return $this->belongsTo(SchedulePeriod::class, 'schedule_period_id' , 'id');
    }

    public function getFromAttribute($value) {
        $c= new Carbon( $value);
        if ($value && $c){
            return $c->format('g:i A');
        }return null;
    }
    public function getToAttribute($value) {
        $c= new Carbon( $value);
        if ($value && $c){
            return $c->format('g:i A');
        }return null;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'account');
    }


    public function library_files()
    {
        return $this->morphMany(LibraryFile::class, 'model');
    }


}
