<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryFileType extends Model
{
    use HasFactory;

    protected $guarded = [];


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
