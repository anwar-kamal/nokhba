<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Traits\HasCompanyTrait;

class Order extends Model
{
    use HasFactory;

    use HasCompanyTrait;

    protected $table = 'orders';
    protected $fillable = [
        'account_id' , 'account_type',
        'customer_pledge_id', 'taxes_amount','total_amount_with_taxes',
        'total_amount' , 'status','payment_status',
        'branch_id' , 'created_by_user_id',
        'last_updated_by' , 'comment','special_offer_amount','currency_id',
    ];
    public function created_by_user()   {
        return $this->belongsTo(User::class, 'created_by_user_id', 'id');
    }
    public function last_updated_by_user()   {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function currency()    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
    public function order_installments(){
        return $this->hasMany(OrderInstallment::class , "order_id" , "id");
    }
    public function customer_pledge(){
        return $this->belongsTo(CustomerFile::class, 'customer_pledge_id', 'id');
    }
    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function order_details() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function order_payments()  {
        return $this->hasMany(OrderPayment::class, 'order_id', 'id');
    }
    // customer or corporate
    public function account()    {
        return $this->morphTo();
    }
    function targets()
    {
        return $this->hasMany(Target::class,"order_id","id");
    }

    public function AddAuthHistory( $action , $comment , $created_by ){

        $auth_history = new AuthHistory();
        $auth_history->action        = $action;
        $auth_history->order_id      = $this->id;
        $auth_history->comment       = $comment ;
        $auth_history->created_by    = $created_by ;
        $auth_history->save();

     }

     public function signatures_history() {
         return $this->hasMany(AuthHistory::class,"order_id","id");
     }

     public function getOtpMethod(){
        $history = $this->signatures_history()->where("comment","like","%customer send otp to%")->orderBy("id","desc")->first();
        if ($history){
            if (strpos($history->comment, "email") !== false) {
                return "email";
            } else if (strpos($history->comment, "mobile") !== false) {
                return "mobile";
            }
        }
        return false ;
    }

}
