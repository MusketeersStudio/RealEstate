<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lease_id',

        'created_by',
        'modified_by'
    ];

    public function lease(){
        $this->belongsTo('App\Models\Lease','lease_id');
    }
}
