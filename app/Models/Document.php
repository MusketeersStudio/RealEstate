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

    public function doc(){
        return $this->morphTo();
    }
}
