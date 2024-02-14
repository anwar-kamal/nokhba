<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompanyTrait;

class Package extends Model
{
    use HasCompanyTrait;
    use HasFactory;

    protected $table = 'packages';
    protected $fillable = [
        'name'  ,'last_updated_by' ,'comment',
        'start_date'  ,'end_date' ,'total_amount' ,'activate'
        ,'currency_id',
    ];

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, PackageProduct::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
    public function package_products()
    {
        return $this->hasMany(PackageProduct::class, 'package_id', 'id');
    }

    public function getStartDateAttribute($value) {
        return Carbon::parse($value) ;
    }
    public function getEndDateAttribute($value) {
        if ($value == null){
            return null;
        }else{
        return Carbon::parse($value) ;
        }
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
    public function reviews()
    {
        return $this->morphMany(Review::class,'model');
    }

    // morph meta
    public function meta($key='all')
    {
        $relation = $this->morphMany(\App\Models\MetaProonline::class,'meta_proonline','model_type','model_id');
        if ($key == 'all')
            return $relation;
        return $relation->where('title',$key)->first();
    }

    public function get_custom_meta($key){
        $meta = $this->morphMany(\App\Models\MetaProonline::class,'meta_proonline','model_type','model_id')
            ->where('title',$key)->first();
        if ($meta && $content = $meta->content)  {
            $removed = str_replace('<p>','',$content);
            return $removed_content = str_replace('</p>','',$removed);
        }
        return false ;
    }

    public function meta_lang($key='all'){
        return (\App::getLocale() =='ar') ?$this->meta($key.'_ar') :$this->meta($key);
    }

    public function image(){
        $img =  $this->meta('image_banner') ?$this->meta('image_banner')->content:false ;
        if (!$img){
            $product = $this->products()->first();
            return $product->image();
        }

        return $img ? env('APP_URL_ERP').'/storage/'.$img : env('APP_URL_ERP').'/images/default-image.jpg';
    }
}
