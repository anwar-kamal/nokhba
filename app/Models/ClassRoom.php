<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'class_rooms';
    protected $fillable = [
        'name'  ,'last_updated_by' ,'comment',
        'location'  ,'capacity' ,'type',
        'configuration'  ,'branch_id' ,
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_sessions()
    {
        return $this->hasMany(CourseSession::class, 'class_room_id', 'id');
    }
}
