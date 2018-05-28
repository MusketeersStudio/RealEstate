<?php

namespace App\GraphQL\Enums;

use Folklore\GraphQL\Support\EnumType;

class Mutation_Method extends EnumType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'Mutation_Method',
        'description' => 'Holds the accepted method for a mutation request. E.g add, delete, update',
    ];


    public function values() {
        return [
            'ADD',
            'UPDATE',
            'DELETE',
        ];
    }
}
