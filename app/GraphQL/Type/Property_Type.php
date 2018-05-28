<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Property_Type extends BaseType
{
    protected $attributes = [
        'name' => 'property_type',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'description' => [
                'type' => Type::string(),
            ],

            'properties' => [
                'type' => Type::listOf(GraphQL::type('property')),
                'resolve' => function($unitType, array $args){
                    return $unitType->properties;
                }
            ],
        ];
    }
}

class Property_Type_Input extends Property_Type {
    protected $attributes = [
        'name' => 'property_type_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
