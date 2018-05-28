<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model implements CRUDable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lease_id',

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
                'lease_id',
            ],

            /**
             * Models authorized to modify this model
             */
            'authorized' => [0,1],

            /**
             * Models authorized to modify this model
             */
            'owner' => [
                'lease_id',
            ]
        ];
    }

    public function lease(){
        $this->belongsTo('App\Models\Lease','lease_id');
    }
}
