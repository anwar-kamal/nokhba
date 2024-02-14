<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App as FacadesApp;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Traits\HasCompanyTrait;


class Customer extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasCompanyTrait;

    // protected $table = 'customers';
    protected $guarded = [];
    protected $guard = 'customers';

    public function getNameAttribute()
    {
        return ucfirst($this->en_f_name) . ' ' . ucfirst($this->en_m_name) . ' ' . ucfirst($this->en_l_name);
    }

    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function last_follow_up_by_user()
    {
        return $this->belongsTo(User::class, 'last_follow_up_by', 'id');
    }

    public function opened_by_user()
    {
        return $this->belongsTo(User::class, 'opened_by', 'id');
    }
    public function corporate()
    {
        return $this->belongsTo(Corporate::class, 'corporate_id', 'id');
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo(Nationality::class, 'country_id', 'id');
    }
    public function how()
    {
        return $this->belongsTo(How::class, 'how_id', 'id');
    }
    public function account_source()
    {
        return $this->belongsTo(AccountSource::class, 'account_source_id', 'id');
    }
    // test relationship before using it
    public function interests()
    {
        return $this->belongsToMany(Interest::class, CustomerInterset::class);
    }
    public function customer_interests()
    {
        return $this->hasMany(CustomerInterset::class);
    }
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'account');
    }

    // test relationship before using it
    public function relatives()
    {
        //        return $this->belongsToMany(Customer::class, CustomerRelative::class ,"relative_id"  ,"customer_id");
        return $this->hasMany(CustomerRelative::class, 'customer_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(CustomerFile::class, 'customer_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'customer_id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'account');
    }

    public function all_comments()
    {
        return $this->hasMany(Comment::class, 'customer_id', 'id');
    }
    public function orders()
    {
        return $this->morphMany(Order::class, 'account');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, CourseCustomer::class);
    }

    public function course_customer()
    {
        return $this->hasMany(CourseCustomer::class, 'customer_id', 'id');
    }
    public function course_customer_exams()
    {
        return $this->hasMany(CourseCustomerExam::class, 'customer_id', 'id');
    }

    public function made_comments()
    {
        return $this->morphMany(Comment::class, 'created_by');
    }
    public function customer_groups()
    {
        return $this->hasManyThrough(CustomerGroup::class, CustomerGroupDetail::class, 'customer_id', 'id', 'id', 'customer_group_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function tax_excepts()
    {
        return $this->morphMany(TaxExcept::class, 'model');
    }
    public function getCurrencyAttribute()
    {
        if ($this->orders->count() > 0)
            return $this->orders()->first()->currency->name;
        else null;
    }

    public function lead_customer()
    {
        return $this->belongsTo(LeadCustomer::class, 'lead_customer_id', 'id');
    }

    public function lead_related_customers()
    {
        return $this->hasMany(LeadRelatedCustomer::class, "customer_id", "id");
    }

    public function related_leads()
    {
        return $this->belongsToMany(LeadCustomer::class, LeadRelatedCustomer::class);
    }

    public function customer_surveys()
    {
        return $this->hasMany(CustomerSurvey::class, 'customer_id', 'id');
    }

    public function follow_up_requests()
    {
        return $this->hasMany(FollowUpRequest::class, 'customer_id', 'id');
    }

    public function last_follow_up_request()
    {
        return $this->hasOne(FollowUpRequest::class, 'id', 'last_follow_up_request_id');
    }

    public function blog_posts()
    {
        return $this->morphMany(BlogPost::class, 'created_by');
    }

    public function wish_items()
    {
        return $this->hasMany(CustomerWishList::class, 'customer_id', 'id');
    }
    public function comments_by_customer()
    {
        return $this->morphMany(Comment::class, 'created_by');
    }
    function  customer_diploma_orders(){
        $diploma_order_details = $this->order_details()->where("item_type","App\Models\SemesterCustomer");
        return $diploma_order_details;
    }
    public function is_demo_user(){
        return ($this->id == env('demo_customer_id',195703)) ? true : false ;
    }
    public function active_courses()
    {
        $courses = Course::whereIn("id",$this->course_customer->whereNotIn("confirmation",["Rejected","Not Yet"])->pluck("course_id")->toArray());
        return $courses;
    }
}
