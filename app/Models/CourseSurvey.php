<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSurvey extends Model
{
    use HasFactory;

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'survey_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function customer_surveys(){
        return $this->hasMany(CustomerSurvey::class , "course_survey_id" ,"id");
    }

}
