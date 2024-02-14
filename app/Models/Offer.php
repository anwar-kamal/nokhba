<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompanyTrait;


class Offer extends Model
{
    use HasFactory;
    use HasCompanyTrait;

    protected $table = 'offers';
    protected $fillable = [
        'name'  ,'last_updated_by' ,'comment',
        'start_date'  ,'end_date' ,'discount_ratio',
        'amount'  ,'activate' ,'currency_id',
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, ProductOffer::class);
    }
    public function products_offer(){
        return $this->hasMany(ProductOffer::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
    public function order_details()
    {
        return $this->morphMany(OrderDetail::class, 'item');
    }

    public function model_display_in()
    {
        return $this->morphMany(ModelDisplayIn::class, 'model');
    }

    public function customer_wish_lists()
    {
        return $this->morphMany(CustomerWishList::class, 'item');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'account');
    }

    public function seo_data()
    {
        return $this->morphOne(SeoData::class, 'model');
    }

//    public function getStartDateAttribute($value) {
//        return Carbon::parse($value) ;
//    }
//    public function getEndDateAttribute($value) {
//        return Carbon::parse($value) ;
//    }
}
