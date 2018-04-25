<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',
        'tenant_id',
        'payment_details_id',

        'status',
        'duration',
        'start_date',
        'end_date',


        'created_by',
        'modified_by'
    ];

    public function unit(){
        $this->belongsTo('App\Models\Unit','unit_id');
    }

    public function tenant(){
        $this->belongsTo('App\Models\Tenant','tenant_id');
    }

    public function payment_details(){
        $this->hasOne('App\Models\PaymentDetails','payment_details_id');
    }
}
