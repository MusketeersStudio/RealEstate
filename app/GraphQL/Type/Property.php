<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Property extends BaseType
{
    protected $attributes = [
        'name' => 'property',
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'status' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'description' => [
                'type' => Type::string(),
            ],
            'unit_prefix' => [
                'type' => Type::string(),
            ],
            'total_units' => [
                'type' => Type::int(),
            ],


            'property_type' => [
                'type' => GraphQL::type('property_type'),
                'resolve' => function($unitType, array $args){
                    return $unitType->property_type;
                }
            ],
            'manager' => [
                'type' => GraphQL::type('user'),
                'resolve' => function($unitType, array $args){
                    return $unitType->manager;
                }
            ],
            'location' => [
                'type' => GraphQL::type('location'),
                'resolve' => function($unitType, array $args){
                    return $unitType->location;
                }
            ],
            'units' => [
                'type' => Type::listOf(GraphQL::type('unit')),
                'resolve' => function($unitType, array $args){
                    return $unitType->units;
                }
            ],
            'pictures' => [
                'type' => Type::listOf(GraphQL::type('picture')),
                'resolve' => function($unitType, array $args){
                    return $unitType->pictures;
                }
            ],
        ];
    }
}
class Property_Input extends Property {
    protected $attributes = [
        'name' => 'property_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}