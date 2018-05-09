<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model implements CRUDable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
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
                'name',
                'description',
            ],

            /**
             * Foreign Keys in the model.
             */
            'foreign_keys' => [],

            /**
             * Models authorized to modify this model
             */
//            'authorized' => [0,1], //TODO: CHECK FOR AUTHORITY (i.e. SYSTEM based operation)

            /**
             * Models authorized to modify this model
             */
            'owner' => [
                'user_id' => 0, //SYSTEM
            ]
        ];
    }

    public function properties(){
        $this->hasMany('App\Models\Property','property_type_id');
    }
}
