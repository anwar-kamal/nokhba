<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStatus extends Model
{
    use HasFactory;
    protected $table = 'course_statuses';
    protected $fillable = ['name_ar'  ,'name_en','last_updated_by' ,'comment' ,'color'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'course_status_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function getNameAttribute() {
        if ( App::getLocale() =="en"){
            return ucfirst($this->name_en) ;
        }else{
            return $this->name_ar;
        }
    }
}
