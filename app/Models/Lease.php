<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model implements CRUDable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'user_id',

        'status',
        'duration',
        'start_date',
        'end_date',
        'lease_number',
    ];

    //CRUD
    public static function crudSettings()
    {
        return[
            /**
             * Whether the model has a picture.
             */
            'hasPicture'=>false,

            /**
             * Whether the model has a picture.
             */
            'hasDocument'=>false,

            /**
             * Whether the model has a payment plan.
             */
            'hasPaymentPlan'=>false,

            /**
             * Attributes that will be persisted to and from the
             * database
             */
            'attributes' => [

            ],

            /**
             * Foreign Keys in the model.
             */
            'foreign_keys' => [
                'unit' => 'unit_id',
                'user' => 'user_id',
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

    public function unit(){
        $this->belongsTo('App\Models\Unit','unit_id');
    }

    public function tenant(){
        $this->belongsTo('App\Models\User','user_id');
    }

    public function payment_details(){
        $this->hasOne('App\Models\PaymentDetails','lease_id');
    }
}
