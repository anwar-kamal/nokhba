<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';
    protected $fillable = [
            'en' , 'ar','last_updated_by',
        ];

    public function getNameAttribute() {
        if ( App::getLocale() =="en"){
            return ucfirst($this->en) ;
        }else{
            return ucfirst($this->ar) ;
        }
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function currencies()
    {
        return $this->hasMany(Currency::class, 'currency_id', 'id');
    }
    public function product_prices()
    {
        return $this->hasMany(ProductPrice::class, 'currency_id', 'id');
    }
    // check it
    public function products()
    {
        return $this->belongsToMany(Product::class, ProductPrice::class);
    }
}
