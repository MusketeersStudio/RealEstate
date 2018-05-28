<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Login extends Query
{/**
 * Type query returns.
 *
 * @return Type
 */
    public function type()
    {
        return GraphQL::type('user_sign_in_payload');
    }

    /**
     * Available query arguments.
     *
     * @return array
     */
    public function args()
    {
        return [
            'email' => [
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'password' => [
                'type' => Type::string(),
                'rules' => ['required']
            ]
        ];
    }

    /**
     * Resolve the query.
     *
     * @param  mixed  $root
     * @param  array  $args
     * @return mixed
     */
    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        try {
            if (! $token = JWTAuth::attempt($args)) {
                throw new Exception(json_encode(['authentication_failure']));
            }
        } catch (JWTException $e) {
            return false;
        }
        return [
            'token' => $token,
            'user' => Auth::guard()->user(),
        ];
    }
}
