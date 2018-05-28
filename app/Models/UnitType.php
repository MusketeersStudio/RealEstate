<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class UnitType extends Model implements CRUDable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',

        'size',
        'bedrooms',
        'bathrooms',
        'kitchens',
        'sitting_rooms',
        'car_spaces',
    ];

    //CRUD
    public static function crudSettings()
    {
        return[
            /**
             * Whether the model has a picture.
             */
            'hasPicture'=>true,

            /**
             * Whether the model has a picture.
             */
            'hasDocument'=>false,

            /**
             * Whether the model has a payment plan.
             */
            'hasPaymentPlan'=>true,

            /**
             * Attributes that will be persisted to and from the
             * database
             */
            'attributes' => [
                'size',
                'bedrooms',
                'bathrooms',
                'kitchens',
                'sitting_rooms',
                'car_spaces',
            ],

            /**
             * Foreign Keys in the model.
             */
            'foreign_keys' => [
                'property_id'
            ],

            /**
             * Models authorized to modify this model
             */
            'authorized' => [0,1],

            /**
             * Models authorized to modify this model
             */
            'owner' => [
                'property_id',
            ]
        ];
    }

    //Needs to belong to a property because multiple properties may have different
    //pictures of the unit type and different plans
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
