<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Document extends BaseType
{
    protected $attributes = [
        'name' => 'document',
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
            'documentable_id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'documentable_type' => [
                'type' => Type::string(),
            ],

        ];
    }
}

class Document_Input extends Document{
    protected $attributes = [
        'name' => 'document_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
