<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Lease extends BaseType
{
    protected $attributes = [
        'name' => 'lease',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'  => [
                'type' => Type::nonNull(Type::int()),
            ],
            'status'  => [
                'type' => Type::nonNull(Type::int()),
            ],
            'duration'  => [
                'type' => Type::int(),
            ],
            'start_date'  => [
                'type' => Type::int(),
            ],
            'end_date'  => [
                'type' => Type::int(),
            ],
            'lease_number'  => [
                'type' => Type::nonNull(Type::int()),
            ],
            'unit' => [
                'type' => GraphQL::type('unit'),
                'resolve' => function($unitType, array $args){
                    return $unitType->unit;
                }
            ],
            'tenant' => [
                'type' => GraphQL::type('user'),
                'resolve' => function($unitType, array $args){
                    return $unitType->tenant;
                }
            ],
            'payment_details' => [
                'type' => GraphQL::type('payment_details'),
                'resolve' => function($unitType, array $args){
                    return $unitType->payment_details;
                }
            ],
        ];
    }
}

class Lease_Input extends Lease {
    protected $attributes = [
        'name' => 'lease_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
