<?php

namespace App\Models;

use App\Util\CRUD\CRUDable;
use Illuminate\Database\Eloquent\Model;

class Property_Type extends Model implements CRUDable
{

    protected $table = "property_types";
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
            'foreign_keys' => null,

            /**
             * Models authorized to modify this model
             */
            'authorized' => [0,1],

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
