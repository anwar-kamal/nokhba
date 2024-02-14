<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchInstructor extends Model
{
    use HasFactory;

    protected $table = 'branch_instructors';
    protected $fillable = ['branch_id'  ,'last_updated_by' ,'instructor_id'];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
