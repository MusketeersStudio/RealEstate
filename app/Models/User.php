<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pass', 'remember_token',
    ];

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