<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentType extends Model
{
    use HasFactory;

    protected $table = 'comment_types';
    protected $fillable = ['name'  ,'last_updated_by'];


    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function comment_statuses()
    {
        return $this->hasMany(CommentStatus::class, 'comment_type_id', 'id');
    }
}
