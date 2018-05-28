<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name',
        'location',
        'description',

        'documentable_id',
        'documentable_type',
    ];

    /**
     * Retrieve the model(documentable model) that owns this document.
    */
    //polymorphic relationship
    public function documentable(){
        return $this->morphTo();
    }
}
