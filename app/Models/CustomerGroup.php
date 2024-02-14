<?php

namespace App\Models;

use App\Models\Traits\HasCompanyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGroup extends Model
{
    use HasFactory;
    use HasCompanyTrait;

    protected $table = 'customer_groups';
    protected $fillable = [
            'name' , 'last_updated_by','comment',
        ];

        public function last_updated_by_user()
        {
            return $this->belongsTo(User::class, 'last_updated_by', 'id');
        }
        public function customer_group_details(){
            return $this->hasMany(CustomerGroupDetail::class,'customer_group_id','id');
        }
        public function comments()
        {
            return $this->morphMany(Comment::class, 'account');
        }
        public function customers(){
            return $this->belongsToMany(Customer::class , CustomerGroupDetail::class );
        }
        public function tax_excepts()
        {
            return $this->morphMany(TaxExcept::class, 'model');
        }

}
