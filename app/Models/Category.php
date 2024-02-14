<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Traits\HasCompanyTrait;

class Category extends Model
{
    use HasFactory;
    use HasCompanyTrait;
/*    //To Tracking Activity
    use LogsActivity;
    // To Change Description For Event it has
    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName} Category";
    }
    // To Set Log Name for record on Activity_logs Table
    protected static $logName = 'categories';
    //To Log only those that has actually changed after the update
    protected static $logOnlyDirty = true;
    //End*/

    protected $table = 'categories';
    protected $fillable = ['name'  ,'name_ar'  ,'last_updated_by' ,'comment' ,'comment_ar' ,'image_ar','image_en','category_id'];

    public function sub_categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function main_category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function model_display_in()
    {
        return $this->morphMany(ModelDisplayIn::class, 'model');
    }

    public function blog_categories()
    {
        return $this->belongsToMany(BlogCategory::class, BlogRelatedErpCategory::class);
    }

    public function seo_data()
    {
        return $this->morphOne(SeoData::class, 'model');
    }
    public $get_flag = true;

    public function getNameAttribute(){
        //if (!$get_flag  )

        if (session('locale') == 'ar')
            return $this->name_ar;
        else return $this->getAttributes()['name'];
    }
    public function getDescriptionAttribute(){
        if (session('locale') == 'ar')
            return $this->description_ar;
        else return $this->description_en;
    }

    public function getImageAttribute(){
        if (session('locale') == 'ar')
            return $this->image_ar;
        else return $this->image_en;
    }

    // morph meta
    public function meta($key='all')
    {
        $relation = $this->morphMany(\App\Models\MetaProonline::class,'meta_proonline','model_type','model_id');
        if ($key == 'all')
            return $relation;
        return $relation->where('title',$key)->first();
    }

    public function get_meta($key)
    {
        $relation = $this->morphMany(\App\Models\MetaProonline::class,'meta_proonline','model_type','model_id');
        if ($meta = $relation->where('title',$key)->first())
            return $meta->content;
        else return false ;
    }

}
