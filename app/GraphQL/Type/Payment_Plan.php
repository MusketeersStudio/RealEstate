<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Payment_Plan extends BaseType
{
    protected $attributes = [
        'name' => 'payment_plan',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'deposit' => [
                'type' => Type::int(),
            ],
            'monthly_price' => [
                'type' => Type::int(),
            ],
            'water_deposit' => [
                'type' => Type::int(),
            ],
            'electricity_deposit' => [
                'type' => Type::int(),
            ],

            'payable_id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'payable_type' => [
                'type' => Type::string(),
            ],
        ];
    }
}
class Payment_Plan_Input extends Payment_Plan {
    protected $attributes = [
        'name' => 'payment_plan_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
