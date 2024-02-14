<?php

namespace App\Models;

use App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = [
        'en_name' ,'ar_name'  ,'last_updated_by' ,'comment' ,'gender', "company_id",
        "tax_ratio", "activate_tax","follow_duration","max_follows",
        "open_account_lock", "open_points","follow_points","order_points",
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'account');
    }
    public function taxes()
    {
        return $this->morphMany(Tax::class, 'model');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'branch_id', 'id');
    }
    public function monthly_target_points()
    {
        return $this->hasMany(MonthlyTargetPoint::class, 'branch_id', 'id');
    }
    public function class_rooms()
    {
        return $this->hasMany(ClassRoom::class, 'branch_id', 'id');
    }
    public function lead_customers()
    {
        return $this->hasMany(LeadCustomer::class, 'branch_id', 'id');
    }
    public function instructors()
    {
        return $this->belongsToMany(User::class, BranchInstructor::class,'branch_id','instructor_id');
    }

    public function branch_instructors()
    {
        return $this->hasMany(BranchInstructor::class,'branch_id' , 'id');
    }
    public function payment_machines()
    {
        return $this->hasMany(PaymentMachine::class, 'branch_id', 'id');
    }

    public function periods()
    {
       return $this->hasMany(Period::class , 'branch_id' ,'id');
    }

    public function treasuries()
    {
        return $this->hasMany(Treasury::class , 'branch_id' , 'id');
    }
    public function getNameAttribute() {
        if ( App::getLocale() =="en"){
            return ucfirst($this->en_name) ;
        }else{
            return $this->ar_name;
        }
    }
}
