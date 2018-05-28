<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * This query should be dependent on an authentication key after the user has logged in.
 *
*/
class Viewer extends Query
{
    private $auth;

    /**
     * Type query returns.
     *
     * @return Type
     */
    public function type()
    {
        return GraphQL::type('user');
    }

    /**
     * Available query arguments.
     *
     * @return array
     */
    public function args()
    {
        return [];
    }

    public function authorizeToken(array $args = [])
    {
        try {
            $this->auth = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            $this->auth = null;
        }
        return (boolean) $this->auth;
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
        return $this->authorizeToken() ? $this->auth : null;
    }
}
