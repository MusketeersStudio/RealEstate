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

    public function pic(){
        return $this->morphTo();
    }
}
