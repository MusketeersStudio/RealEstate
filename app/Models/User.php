<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements CRUDable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'sub_role',
        'authority',

        'full_name',
        'status',
        'email',
        'password',
        'tel',
        'alt_tel',
        'national_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
                'role',
                'sub_role',
                'authority',

                'full_name',
                'status',
                'email',
                'password',
                'tel',
                'alt_tel',
                'national_id',
            ],

            /**
             * Foreign Keys in the model.
             */
            'foreign_keys' => [],

            /**
             * Models authorized to modify this model
             */
            'authorized' => [0,1],

            /**
             * Models authorized to modify this model
             */
            'owner' => [
                'id' => null,
            ]
        ];
    }

    //RELATIONSHIPS
    public function leases(){
        $this->hasMany('App\Models\Lease','user_id');
    }

    public function location(){
        $this->morphOne('App\Models\Location','locatable');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }

    public function documents(){
        return $this->morphMany('App\Models\Document','documentable');
    }
}