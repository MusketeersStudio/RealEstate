<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'manager_id',

        'name',
        'status',
        'description',
        'unit_prefix',
        'total_units',

        'created_by',
        'modified_by'
    ];

    //RELATIONSHIP
    public function property_type(){
        $this->belongsTo('App\Models\PropertyType','property_type_id');
    }

    public function manager(){
        $this->belongsTo('App\Models\PropertyManager','manager_id');
    }

    public function location(){
        $this->hasOne('App\Models\Location','property_id');
    }

    public function units(){
        $this->hasMany('App\Models\Unit','property_id');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }

}
