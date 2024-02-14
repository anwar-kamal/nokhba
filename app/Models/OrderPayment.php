<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class OrderPayment extends Model
{
    use HasFactory;

    protected $table = 'order_payments';
    protected $fillable = [
            'order_id' , 'amount',
            'receipt_id','payment_method_id',
            'receipt_serial_no' , 'payment_machine_id',
            'branch_id' ,'bank_transfer_receipt',
            'last_updated_by' , 'comment',
        ];

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function receipt()
    {
        return $this->belongsTo(CustomerFile::class, 'receipt_id', 'id');
    }
    public function bank_transfer_receipt_file()
    {
        return $this->belongsTo(CustomerFile::class, 'bank_transfer_receipt', 'id');
    }
    public function payment_machine()
    {
        return $this->belongsTo(PaymentMachine::class, 'payment_machine_id', 'id');
    }
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id');
    }
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
}
