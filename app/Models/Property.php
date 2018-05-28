<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class Property extends Model implements CRUDable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'property_type_id',

        'name',
        'status',
        'description',
        'unit_prefix',
        'total_units',
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
            'hasDocument'=>true,

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
                'status',
                'description',
                'unit_prefix',
                'total_units',
            ],

            /**
             * Foreign Keys in the model.
             */
            'foreign_keys' => [
                'user_id',
                'property_type_id',
            ],

            /**
             * Models authorized to modify this model
            */
            'authorized' => [0,1],

            /**
             * Models authorized to modify this model
             */
            'owner' => [
                'user_id' => null,
            ]
        ];
    }

    //RELATIONSHIP
    public function property_type(){
        $this->belongsTo('App\Models\PropertyType','property_type_id');
    }

    public function manager(){
        $this->belongsTo('App\Models\User','user_id');
    }

    public function location(){
        $this->morphOne('App\Models\Location','locatable');
    }

    public function units(){
        $this->hasMany('App\Models\Unit','property_id');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }

}
