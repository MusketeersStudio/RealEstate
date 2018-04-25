<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_id',

        'deposit',
        'monthly_price',
        'water_deposit',
        'electricity_deposit',

        'created_by',
        'modified_by'
    ];

    public function payment_plan(){
        $this->belongsTo('App\Models\Unit','unit_id');
    }

}
