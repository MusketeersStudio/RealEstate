<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Maintenance extends BaseType
{
    protected $attributes = [
        'name' => 'maintenance',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'unit' => [
                'type' => GraphQL::type('unit'),
                'resolve' => function($unitType, array $args){
                    return $unitType->unit;
                }
            ],
            'owner' => [
                'type' => GraphQL::type('user'),
                'resolve' => function($unitType, array $args){
                    return $unitType->owner;
                }
            ],

            'overall_status' => [
                'type' => Type::int(),
            ],
            'wall_status' => [
                'type' => Type::int(),
            ],
            'floor_status' => [
                'type' => Type::int(),
            ],
            'window_status' => [
                'type' => Type::int(),
            ],
            'plumbing_status' => [
                'type' => Type::int(),
            ],
            'electricity_status' => [
                'type' => Type::int(),
            ],
            'other_status' => [
                'type' => Type::int(),
            ],

            'overall_description' => [
                'type' => Type::string(),
            ],
            'wall_description' => [
                'type' => Type::string(),
            ],
            'floor_description' => [
                'type' => Type::string(),
            ],
            'window_description' => [
                'type' => Type::string(),
            ],
            'plumbing_description' => [
                'type' => Type::string(),
            ],
            'electricity_description' => [
                'type' => Type::string(),
            ],
            'other_description' => [
                'type' => Type::string(),
            ],
        ];
    }
}
class Maintenance_Input extends Maintenance {
    protected $attributes = [
        'name' => 'maintenance_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}