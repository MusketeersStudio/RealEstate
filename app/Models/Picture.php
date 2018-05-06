<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'name',
        'location',
        'description',

        'picturable_id',
        'picturable_type',
    ];

    /**
     * Retrieve the model(picturable model) that owns this picture.
     */
    //polymorphic relationship
    public function picturable(){
        return $this->morphTo();
    }
}
