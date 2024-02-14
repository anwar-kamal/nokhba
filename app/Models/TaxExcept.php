<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxExcept extends Model
{
    use HasFactory;

    protected $table = 'tax_excepts';
    protected $fillable = ['product_id','tax_type_id','comment' ,'last_updated_by' ,'model_id','model_type' ,'from' ,'to'];

    public function tax_type()
    {
        return $this->belongsTo(TaxType::class, 'tax_type_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
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
