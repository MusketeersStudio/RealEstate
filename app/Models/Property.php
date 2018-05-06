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
        'user_id',
        'property_type_id',

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
