<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Traits\HasCompanyTrait;

class LeadCustomer extends Model
{
    use HasFactory;
    use HasCompanyTrait;
/*    //To Tracking Activity
    use LogsActivity;
    // To Record Data to log it
    protected static $logAttributes = ['id','name','mobile','lead_source.name','product.name','lead_status.name','lead_type.name','last_updated_by_user.name',
        'created_by_user.name','assigned_by_user.name','assigned_to_user.name'];
    // To Change Description For Event it has
    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName} LeadCustomers";
    }
    // To Set Log Name for record on Activity_logs Table
    protected static $logName = 'lead_customers';
    //To Log only those that has actually changed after the update
    protected static $logOnlyDirty = true;
    //End*/
    public function lead_source()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function lead_status()
    {
        return $this->belongsTo(LeadStatus::class, 'lead_status_id', 'id');
    }
    public function lead_type()
    {
        return $this->belongsTo(LeadType::class, 'lead_type_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class , 'created_by','id');
    }
    public function assigned_by_user()
    {
        return $this->belongsTo(User::class, 'assigned_by', 'id');
    }
    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class , 'id','lead_customer_id');
    }

    public function lead_related_customers(){
        return $this->hasMany(LeadRelatedCustomer::class ,"lead_customer_id" ,"id");
    }

    public function related_customers(){
        return $this->belongsToMany(Customer::class , LeadRelatedCustomer::class );
    }
    public function related_leads(){
        return $this->belongsToMany(LeadCustomer::class , LeadRelatedLead::class ,'lead_customer_id','related_lead_customer_id');
    }

    public function leadHistory()
    {
        return $this->hasMany(LeadCustomerAssignHistory::class,'lead_customer_id','id');
    }
}
