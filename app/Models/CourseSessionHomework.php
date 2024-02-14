<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSessionHomework extends Model
{
    use HasFactory;

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function verify_by_user()
    {
        return $this->belongsTo(User::class, 'verify_by', 'id');
    }

    public function course_customer()
    {
        return $this->belongsTo(CourseCustomer::class, 'course_customer_id', 'id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function library_files()
    {
        return $this->morphMany(LibraryFile::class, 'model');
    }

    public function homework_comments()
    {
        return $this->morphMany(HomeworkComment::class, 'model');
    }

    public function user_homework_comments()
    {
        return $this->morphMany(HomeworkComment::class, 'user', 'user_model', 'user_id');
    }
}
