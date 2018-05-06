<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size',
        'bedrooms',
        'bathrooms',
        'kitchens',
        'sitting_rooms',
        'car_spaces',

        'created_by',
        'modified_by'
    ];

    //Needs to belong to a property because multiple properties may have different
    //pitures of the unit type and different plans
    public function property(){
        $this->belongsTo('App\Models\Property','property_id');
    }

    public function units(){
        $this->hasMany('App\Models\Unit','unit_type_id');
    }

    /**
     * Default plan for all of those that don't have unique payment plans
    */
    public function default_payment_plan(){
        return $this->morphOne('App\Models\PaymentPlan','payable');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }
}
