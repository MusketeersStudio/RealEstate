<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Unit_Type extends BaseType
{
    protected $attributes = [
        'name' => 'unit_type',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'size' => [
                'type' => Type::string(),
            ],
            'bedrooms' => [
                'type' => Type::int(),
            ],
            'bathrooms' => [
                'type' => Type::int(),
            ],
            'kitchens' => [
                'type' => Type::int(),
            ],
            'sitting_rooms' => [
                'type' => Type::int(),
            ],
            'car_spaces' => [
                'type' => Type::string(),
            ],


            'property' => [
                'type' => GraphQL::type('property'),
                'resolve' => function($unitType, array $args){
                    return $unitType->property();
                }
            ],
            'units' => [
                'type' => Type::listOf(GraphQL::type('unit')),
                'resolve' => function($unitType, array $args){
                    return $unitType->units();
                }
            ],
            'default_payment_plan' => [
                'type' => GraphQL::type('payment_plan'),
                'resolve' => function($unitType, array $args){
                    return $unitType->default_payment_plan();
                }
            ],
            'pictures' => [
                'type' => Type::listOf(GraphQL::type('picture')),
                'resolve' => function($unitType, array $args){
                    return $unitType->pictures();
                }
            ],

        ];
    }
}

class Unit_Type_Input extends Unit_Type {
    protected $attributes = [
        'name' => 'unit_type_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
