<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Lead extends Model
{
    use HasFactory;
/*    //To Tracking Activity
    use LogsActivity;
    // To Record Data to log it
    protected static $logAttributes = ['id','name','lead_source.name','lead_status.name','lead_type.name','last_updated_by_user.name',
        'created_by_user.name','assigned_to_user.name','comment'.'account.name'];
        // To Change Description For Event it has
    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName} Lead";
    }
    // To Set Log Name for record on Activity_logs Table
    protected static $logName = 'leads';
    //To Log only those that has actually changed after the update
    protected static $logOnlyDirty = true;
    //End*/
    protected $table = 'leads';
    protected $fillable = [
        'name' ,'last_updated_by' ,'comment',
        'lead_type_id' ,'lead_status_id' ,'lead_source_id',
        'account_id' ,'account_type' ,'assigned_to' ,'created_by',
    ];

    public function lead_source()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id', 'id');
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
    function created_by_user()
    {
        return $this->belongsTo(User::class,"created_by","id");
    }
    function assigned_to_user()
    {
        return $this->belongsTo(User::class,"assigned_to","id");
    }
    public function account()
    {
        return $this->morphTo();
    }
}
