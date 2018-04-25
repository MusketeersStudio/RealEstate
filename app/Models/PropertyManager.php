<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyManager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'status',
        'email',
        'pass',
        'tel',
        'alt_tel',
        'national_id',
    ];

    public function properties(){
        $this->hasMany('App\Models\Property','manager_id');
    }
}
