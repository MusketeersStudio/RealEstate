<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Payment_Details extends BaseType
{
    protected $attributes = [
        'name' => 'payment_details',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],

            'lease' => [
                'type' => GraphQL::type('lease'),
                'resolve' => function($unitType, array $args){
                    return $unitType->lease;
                }
            ],

        ];
    }
}
class Payment_Details_Input extends Payment_Details {
    protected $attributes = [
        'name' => 'payment_details_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
