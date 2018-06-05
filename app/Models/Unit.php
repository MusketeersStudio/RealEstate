<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model implements CRUDable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'user_id',
    'property_id',
    'unit_type_id',

    'name',
    'status',
    'description',
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
                'name',
                'status',
                'description',
            ],

            /**
             * Foreign Keys in the model.
             */
            'foreign_keys' => [
                'user' => 'user_id',
                'property' => 'property_id',
                'unit_type' => 'unit_type_id',
            ],

            /**
             * Models authorized to modify this model
             */
            'authorized' => [0,1],

            /**
             * Models authorized to modify this model
             */
            'owner' => [
                'user_id',
            ]
        ];
    }

    public function owner(){
        $this->belongsTo('App\Models\User','user_id');
    }

    public function property(){
        $this->belongsTo('App\Models\Property','property_id');
    }

    public function unit_type(){
        $this->belongsTo('App\Models\UnitType','unit_type_id');
    }

    public function leases(){
        $this->hasMany('App\Models\Lease','unit_id');
    }

    public function unique_payment_plan(){
        return $this->morphOne('App\Models\PaymentPlan','payable');
    }

    public function maintenance(){
        $this->hasOne('App\Models\Maintenance','unit_id');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }
}
