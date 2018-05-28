<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class User_Sign_In_Payload extends BaseType
{
    /**
     * Attributes of type.
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'user_sign_in_payload',
        'description' => 'A type'
    ];


    /**
     * Type fields.
     *
     * @return array
     */
    public function fields()
    {
        return [
            'user' => [
                'type' => GraphQL::type('user'),
                'resolve' => function($payload,array $args){
                    return $payload['user'];
                }
            ],
            'token' => [
                'type' => Type::string(),
                'resolve' => function($payload,array $args){
                    return $payload['token'];
                }
            ],
        ];
    }
}

class User_Sign_In_Payload_Input extends User_Sign_In_Payload {
    protected $attributes = [
        'name' => 'user_sign_in_payload_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
