<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompanyTrait;

class Exam extends Model
{
    use HasFactory;
    use HasCompanyTrait;
    
    protected $table = 'exams';
    protected $fillable = ['start_date' ,'end_date',
     'name' ,'active' ,'pass_percent',
     'last_updated_by' ,'comment' ,'course_level_id',
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_level()
    {
        return $this->belongsTo(CourseLevel::class, 'course_level_id', 'id');
    }
    public function exam_contents()
    {
        return $this->hasMany(ExamContent::class, 'exam_id', 'id');
    }

}
