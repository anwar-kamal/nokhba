<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Nationality extends Model
{
    use HasFactory;

    protected $table = 'nationalities';
    protected $fillable = ['code','name_en' ,'name_ar','country_en','country_ar','last_updated_by'];


    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function customers()
    {
        return $this->hasMany(Customer::class, 'nationality_id', 'id');
    }
    public function getNameAttribute() {
        if ( App::getLocale() =="en"){
            return ucfirst($this->name_en) ;
        }else{
            return $this->name_ar;
        }
    }
}
