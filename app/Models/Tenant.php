<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
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

        'created_by',
        'modified_by'
    ];


    public function lease(){
        $this->hasOne('App\Models\Lease','tenant_id');
    }

    public function pictures(){
        return $this->morphMany('App\Models\Picture','picturable');
    }

    public function documents(){
        return $this->morphMany('App\Models\Document','documentable');
    }
}
