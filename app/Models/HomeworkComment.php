<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeworkComment extends Model
{
    use HasFactory;
    protected $table = 'homework_comments';

    public function model()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->morphTo(__FUNCTION__, 'user_model', 'user_id');
    }
}
