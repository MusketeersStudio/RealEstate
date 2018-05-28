<?php

namespace App\GraphQL\Enums;

use Folklore\GraphQL\Support\EnumType;

class Query_Method extends EnumType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'Query_Method',
        'description' => 'Holds the accepted method for a query request. E.g get, get_all',
    ];

    public function values() {
        return [
            'GET_ONE',
            'GET_ALL',
        ];
    }
}
