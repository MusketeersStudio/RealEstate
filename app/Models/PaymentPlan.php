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
        'payable_id',
        'payable_type',

        'deposit',
        'monthly_price',
        'water_deposit',
        'electricity_deposit',
    ];

    /**
     * Retrieve the model(payable model) that owns this payment plan.
     */
    //polymorphic relationship
    public function payable(){
        return $this->morphTo();
    }

}
