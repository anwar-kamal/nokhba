<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    use HasFactory;

    protected $table = 'tax_types';
    protected $fillable = ['name' ,'ratio','last_updated_by' ,'comment'];

    // public function branches()
    // {
    //     return $this->hasMany(Branch::class, 'tax_id', 'id');
    // }
    public function tax()
    {

    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function tax_expects()
    {
        return $this->hasMany(TaxExcept::class , 'tax_type_id' , 'id');
    }
}
