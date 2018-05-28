<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Location extends BaseType
{
    protected $attributes = [
        'name' => 'location',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'country' => [
                'type' => Type::string(),
            ],
            'county_or_state'  => [
                'type' => Type::string(),
            ],
            'city'  => [
                'type' => Type::string(),
            ],
            'street_address'  => [
                'type' => Type::string(),
            ],
            'landmarks'  => [
                'type' => Type::string(),
            ],

            'latitude'  => [
                'type' => Type::int(),
            ],
            'longitude'  => [
                'type' => Type::int(),
            ],

            'locatable_id'  => [
                'type' => Type::nonNull(Type::int()),
            ],
            'locatable_type'  => [
                'type' => Type::string(),
            ],
        ];
    }
}
class Location_Input extends Location {
    protected $attributes = [
        'name' => 'location_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}