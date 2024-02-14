<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
            'customer_id' , 'comment_type_id',
            'created_by_id' ,'created_by_type',
           'account_id' ,'account_type', 'comment','comment_status_id'
        ];

    // comment by Customer or User one-to-many polymorphic relation
    public function created_by()
    {
        return $this->morphTo();
    }

    // comment on Customer or Customer Group or corporate one-to-many polymorphic relation
    public function account()
    {
        return $this->morphTo();
    }
    public function comment_status()
    {
        return $this->belongsTo(CommentStatus::class, 'comment_status_id', 'id');
    }
    public function comment_type()
    {
        return $this->belongsTo(CommentType::class, 'comment_type_id', 'id');
    }

    public function quality_feedback()
    {
        return $this->hasOne(QualityFeedback::class , 'comment_id' , 'id');
    }
}
