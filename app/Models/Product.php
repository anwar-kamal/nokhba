<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
use App\Models\Traits\HasCompanyTrait;

use function PHPUnit\Framework\isNull;

class Product extends Model
{
    use HasFactory;
    use HasCompanyTrait;
    protected $table = 'products';
    protected $fillable = [
        'name' , 'comment','accountant_number',
        'active', 'activate_tax','product_type_id','last_updated_by',
        'category_id'  ,'vendor_id','customer_age',
    ];

    public function link_data(){

        if (session('locale') == 'ar')
            return ($this->slug_ar)? $this->slug_ar : $this->id;
        else
            return ($this->slug_en)? $this->slug_en : $this->id;
    }
    public function product_type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }
    public function product_prices()
    {
        return $this->hasMany(ProductPrice::class, 'product_id', 'id');
    }
    // check it
    public function currencies()
    {
        return $this->belongsToMany(Currency::class, ProductPrice::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function course_levels()
    {
        return $this->hasMany(CourseLevel::class, 'product_id', 'id');
    }
    public function offers()
    {
        return $this->belongsToMany(Offer::class, ProductOffer::class);
    }
    public function product_offers()
    {
        return $this->hasMany( ProductOffer::class, 'product_id', 'id');
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class, PackageProduct::class);
    }
    public function installment_packages()
    {
        return $this->belongsToMany(InstallmentPackage::class, InstallmentPackageProduct::class);
    }
    // public function order_details()
    // {
    //     return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    // }
    public function taxes()
    {
        return $this->morphMany(Tax::class, 'model');
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
        return $this->morphMany(Comment::class, 'created_by');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class,'model');
    }

    public function comment_ar_limit(){
        $data_sub = filter_var( strip_tags($this->comment_ar , FILTER_SANITIZE_STRING));
        if (strlen($this->comment_ar) <30) $len = strlen($this->comment_ar) ;
        else $len = 30;
        return Str::substr( $data_sub ,0, strpos($data_sub, ' ' , $len ));
    }


    public function seo_data()
    {
        return $this->morphOne(SeoData::class, 'model');
    }

    // morph meta
    public function meta($key='all')
    {
        $relation = $this->morphMany(\App\Models\MetaProonline::class,'meta_proonline','model_type','model_id');
        if ($key == 'all')
            return $relation;
        return $relation->where('title',$key)->first();
    }

    public function meta_lang($key='all'){
        return (\App::getLocale() =='ar') ?$this->meta($key.'_ar') :$this->meta($key);
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

    public function product_branches()
    {
        return $this->hasMany(ProductBranch::class, 'product_id', 'id');
    }

    public function title(){
        return (\App::getLocale() =='ar') ?$this->name_ar :$this->name;
    }

    public function image(){
        $img = (\App::getLocale() =='ar') ?$this->image_ar :$this->image_en;
        return $img ? env('APP_URL_ERP').'/storage/'.$img : env('APP_URL_ERP').'/images/default-image.jpg';
    }



}
