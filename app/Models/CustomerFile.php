<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompanyTrait;

class CustomerFile extends Model
{
    use HasFactory;
    use HasCompanyTrait;


    protected $table = 'customer_files';
    protected $fillable = [
            'customer_id' , 'name','file_type_id',
            'format','last_updated_by',
            'url' , 'comment',
        ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function file_type()
    {
        return $this->belongsTo(FileType::class, 'file_type_id', 'id');
    }

}
