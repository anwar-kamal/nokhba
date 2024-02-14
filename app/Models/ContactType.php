<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    use HasFactory;

    protected $table = 'contact_types';
    protected $fillable = ['name' ,'format' ,'last_updated_by'];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'conatct_type_id', 'id');
    }

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
