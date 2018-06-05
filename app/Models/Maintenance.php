<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model implements CRUDable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'user_id',

        'overall_status',
        'wall_status',
        'floor_status',
        'window_status',
        'plumbing_status',
        'electricity_status',
        'other_status',

        'overall_description',
        'wall_description',
        'floor_description',
        'window_description',
        'plumbing_description',
        'electricity_description',
        'other_description',
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
            'hasPaymentPlan'=>false,

            /**
             * Attributes that will be persisted to and from the
             * database
             */
            'attributes' => [
                'overall_status',
                'wall_status',
                'floor_status',
                'window_status',
                'plumbing_status',
                'electricity_status',
                'other_status',

                'overall_description',
                'wall_description',
                'floor_description',
                'window_description',
                'plumbing_description',
                'electricity_description',
                'other_description',
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

    public function owner(){
        $this->belongsTo('App\Models\User','user_id');
    }
}
