<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $table = 'taxes';
    protected $fillable = ['tax_type_id' ,'last_updated_by' ,'model_id','model_type'];

    public function tax_type()
    {
        return $this->belongsTo(TaxType::class, 'tax_type_id', 'id');
    }
    public function model()
    {
        return $this->morphTo();
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
