<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCustomerAttendance extends Model
{
    use HasFactory;
    protected $table = 'course_customer_attendances';
    protected $fillable = [
        'attend' ,'course_customer_id',
        'course_session_id' ,'instructor_id',
        'confirmd_by' ,'comment', 'instructor_comment',

    ];
    public function confirmd_by_user()
    {
        return $this->belongsTo(User::class, 'confirmd_by', 'id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }
    public function course_customer()
    {
        return $this->belongsTo(CourseCustomer::class, 'course_customer_id', 'id');
    }
    public function course_session()
    {
        return $this->belongsTo(CourseSession::class, 'course_session_id', 'id');
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'account');
    }

}
