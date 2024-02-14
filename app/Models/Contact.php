<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = ['body' ,'conatct_type_id' ,'last_updated_by' ,'account_id','account_type'];

    public function contact_type()
    {
        return $this->belongsTo(ContactType::class, 'conatct_type_id', 'id');
    }
    public function account()
    {
        return $this->morphTo();
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
