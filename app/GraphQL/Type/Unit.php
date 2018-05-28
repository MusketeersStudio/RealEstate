<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Unit extends BaseType
{
    protected $attributes = [
        'name' => 'unit',
        'description' => 'A type'
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


            'owner' => [
                'type' => GraphQL::type('user'),
                'resolve' => function($unitType, array $args){
                    return $unitType->owner;
                }
            ],
            'property' => [
                'type' => GraphQL::type('property'),
                'resolve' => function($unitType, array $args){
                    return $unitType->property;
                }
            ],
            'unit_type' => [
                'type' => GraphQL::type('unit_type'),
                'resolve' => function($unitType, array $args){
                    return $unitType->unit_type;
                }
            ],
            'leases' => [
                'type' => Type::listOf(GraphQL::type('lease')),
                'resolve' => function($unitType, array $args){
                    return $unitType->leases;
                }
            ],
            'unique_payment_plan' => [
                'type' => GraphQL::type('payment_plan'),
                'resolve' => function($unitType, array $args){
                    return $unitType->unique_payment_plan;
                }
            ],
            'maintenance' => [
                'type' => GraphQL::type('maintenance'),
                'resolve' => function($unitType, array $args){
                    return $unitType->maintenance;
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

class Unit_Input extends Unit {
    protected $attributes = [
        'name' => 'unit_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
