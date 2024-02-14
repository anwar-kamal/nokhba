<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryFile extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function model()
    {
        return $this->morphTo();
    }

    public function library_file_type()
    {
        return $this->belongsTo(LibraryFileType::class, 'library_file_type_id', 'id');
    }
}
