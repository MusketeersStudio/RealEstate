<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',

        'address',
        'latitude',
        'longitude',
    ];

    public function property_type(){
        $this->belongsTo('App\Models\Property','property_id');
    }
}
