<?php

namespace App\Models;

use App;
use App\Models\Traits\HasCompanyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    use HasCompanyTrait;

    protected $fillable = ['name_en','name_ar','active','comment' ,'branch_id'];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class,'last_updated_by','id');
    }

    public function schedule_periods()
    {
        return $this->hasMany(SchedulePeriod::class,'period_id','id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }
    public function getNameAttribute() {
        if ( App::getLocale() =="en"){
            return ucfirst($this->name_en) ;
        }else{
            return $this->name_ar;
        }
    }

}
