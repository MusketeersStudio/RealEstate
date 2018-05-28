<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Picture extends BaseType
{
    protected $attributes = [
        'name' => 'picture',
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
            'location' => [
                'type' => Type::string(),
            ],
            'description' => [
                'type' => Type::string(),
            ],
            'picturable_id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'picturable_type' => [
                'type' => Type::string(),
            ],

        ];
    }
}
class Picture_Input extends Picture {
    protected $attributes = [
        'name' => 'picture_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}