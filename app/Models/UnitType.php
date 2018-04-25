<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size',
        'bedrooms',
        'bathrooms',
        'kitchens',
        'sitting_rooms',
        'car_spaces',

        'created_by',
        'modified_by'
    ];


    public function units(){
        $this->hasMany('App\Models\Unit','unit_type_id');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }
}
