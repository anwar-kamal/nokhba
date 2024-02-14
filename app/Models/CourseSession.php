<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CourseSession extends Model
{
    use HasFactory;
    protected $table = 'course_sessions';
    protected $fillable = [
        'session_number', 'course_id',
        'status', 'session_date', 'from',
        'to', 'instructor_id',
        'class_room_id', 'last_updated_by',
        'comment', 'schedule_period_id'
    ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }
    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id', 'id');
    }
    public function course_customer_attendances()
    {
        return $this->hasMany(CourseCustomerAttendance::class, 'course_session_id', 'id');
    }


    /*    public function getFromAttribute($value) {
        return date('h:i A', strtotime($value));
    }
    public function getToAttribute($value) {
        return   date('h:i A', strtotime($value));
    }*/
    public function schedule_period()
    {
        return $this->belongsTo(SchedulePeriod::class, 'schedule_period_id', 'id');
    }
    public function getFromAttribute($value)
    {
        $c = new Carbon($value);
        if ($value && $c) {
            return $c->format('g:i A');
        }
        return null;
    }
    public function getToAttribute($value)
    {
        $c = new Carbon($value);
        if ($value && $c) {
            return $c->format('g:i A');
        }
        return null;
    }


    public function library_files()
    {
        return $this->morphMany(LibraryFile::class, 'model');
    }

    public function homeworks()
    {
        return $this->hasMany(CourseSessionHomework::class, 'session_id', 'id');
    }

    public function exam(){
        return $this->belongsTo(CourseExam::class, 'exam_id', 'id');
    }
}
