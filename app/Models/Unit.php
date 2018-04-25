<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'unit_type_id',
        'maintenance_id',
        'payment_plan_id',

        'name',
        'status',
        'description',

        'created_by',
        'modified_by'
    ];

    public function property(){
        $this->belongsTo('App\Models\Property','property_id');
    }

    public function unit_type(){
        $this->belongsTo('App\Models\UnitType','unit_type_id');
    }

    public function leases(){
        $this->hasMany('App\Models\Lease','unit_id');
    }

    public function payment_plan(){
        $this->hasOne('App\Models\PaymentPlan','unit_id');
    }

    public function maintenance(){
        $this->hasOne('App\Models\Maintenance','unit_id');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }
}
