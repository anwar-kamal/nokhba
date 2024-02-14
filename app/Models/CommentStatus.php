<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentStatus extends Model
{
    use HasFactory;

    protected $table = 'comment_statuses';
    protected $fillable = [
            'comment_type_id' , 'name',
            'last_updated_by',
            'color'
        ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function comment_type()
    {
        return $this->belongsTo(CommentType::class, 'comment_type_id', 'id');
    }
}
