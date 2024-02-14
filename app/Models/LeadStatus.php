<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStatus extends Model
{
    use HasFactory;
    protected $table = 'lead_statuses';
    protected $fillable = ['name' ,'last_updated_by' ,'comment' ,'color'];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'lead_status_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
