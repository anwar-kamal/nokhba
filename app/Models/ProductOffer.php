<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;

    protected $table = 'product_offers';
    protected $fillable = [
        'offer_id'  ,'last_updated_by' ,'product_id',
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function order_details()
    {
        return $this->morphMany(OrderDetail::class, 'item');
    }

    function getPriceAttribute(){
        $product_price =$this->product->product_prices()->where("currency_id" ,$this->offer->currency_id)->first();
        //dd($product_price);
        $item_price = (($this->offer->discount_ratio)?
                $product_price->price_with_tax() - $product_price->price_with_tax() * $this->offer->discount_ratio :
                $this->offer->amount
            );

        return $item_price ;
    }

    public function seo_data()
    {
        return $this->morphOne(SeoData::class, 'model');
    }

    public function link_data(){

        if (session('locale') == 'ar')
            return ($this->slug_ar)? $this->slug_ar : $this->id;
        else
            return ($this->slug_en)? $this->slug_en : $this->id;
    }

    // morph meta
    public function meta($key='all')
    {
        $relation = $this->morphMany(\App\Models\MetaProonline::class,'meta_proonline','model_type','model_id');
        if ($key == 'all')
            return $relation;
        return $relation->where('title',$key)->first();
    }
}
