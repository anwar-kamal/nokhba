<?php

namespace App\Models\Traits;

use Log;

trait HasCompanyTrait {

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {

            $model->company_id =env('Company_ID',1);
        });
    }
    public function company()
    {
        return $this->belongsTo(Company::class );
    }
    protected static function booted()
    {
        static::addGlobalScope('company_id', fn ($query) => $query->whereNotNull('company_id'));
    }
     // override
    public function newQuery($excludeDeleted = true) {

        $login_company = env('Company_ID',1);

        if ( $login_company  ){
            $relations = array('hasOne', 'hasMany', 'belongsTo', 'belongsToMany', 'morphOne', 'morphMany' ,'morphTo' ,'morphEagerTo');
            // $relations = array( 'morphOne', 'morphMany' ,'morphTo');
            list(, $caller) = debug_backtrace(false);
            $calledByRelation = in_array($caller['function'], $relations);
            //$login_company =$login_company  ;

            if ($this->getTable()){
                $col =$this->getTable().".company_id";
            }else $col = "company_id";

            if ($login_company && !$calledByRelation  )
                return  parent::newQuery($excludeDeleted)->where($col ,$login_company );
            else if ( !$calledByRelation  )
                return  parent::newQuery($excludeDeleted)->where($col ,1);
        }
        return parent::newQuery($excludeDeleted);

    }
}
