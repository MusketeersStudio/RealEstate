<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class User extends BaseType
{
    protected $attributes = [
        'name' => 'user',
    ];


    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'role' => [
                'type' => Type::string(),
            ],
            'sub_role' => [
                'type' => Type::string(),
            ],
            /*'authority' => [
                'type' => Type::nonNull(Type::int()),
            ],*/
            'full_name' => [
                'type' => Type::string(),
            ],
            'status' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'tel' => [
                'type' => Type::string(),
            ],
            'alt_tel' => [
                'type' => Type::string(),
            ],
            'national_id' => [
                'type' => Type::string(),
            ],

            'leases' => [
                'type' => Type::listOf(GraphQL::type('lease')),
                'resolve' =>

                /**
                 * @param $user \App\Models\User
                 * @param array $args
                 * @return mixed
                 */
                    function($user, array $args){
                    return $user->leases();
                }
            ],
            'location' => [
                'type' => Type::listOf(GraphQL::type('location')),
                'resolve' =>

                /**
                 * @param $user \App\Models\User
                 * @param array $args
                 * @return mixed
                 */
                    function($user, array $args){
                    return $user->location();
                }
            ],
            'pictures' => [
                'type' => Type::listOf(GraphQL::type('picture')),
                'resolve' =>

                /**
                 * @param $user \App\Models\User
                 * @param array $args
                 * @return mixed
                 */
                    function($user, array $args){
                    return $user->pictures();
                }
            ],
            'documents' => [
                'type' => Type::listOf(GraphQL::type('document')),
                'resolve' =>

                /**
                 * @param $user \App\Models\User
                 * @param array $args
                 * @return mixed
                 */
                    function($user, array $args){
                    return $user->documents();
                }
            ],
        ];
    }
}

class User_Input extends User {
    protected $attributes = [
        'name' => 'user_input',
        'description' => 'A type'
    ];

    protected $inputObject = true;
}
