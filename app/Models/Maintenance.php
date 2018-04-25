<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
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

        'created_by',
        'modified_by'
    ];

    public function unit(){
        $this->belongsTo('App\Models\Unit','unit_id');
    }
}
