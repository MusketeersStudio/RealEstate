<?php

namespace App\GraphQL\Mutation;

use App\Services\UserService;
use App\Util\CRUD\HandlesGraphQLMutationRequest;
use GraphQL\Type\Definition\ResolveInfo;

class User
{
    use HandlesGraphQLMutationRequest;


    public function __construct(UserService $CRUDService)
    {
        $this->CRUDService = $CRUDService;
    }

    /**
     * Resolve the mutation.
     *
     * @param  mixed $root
     * @param  array $args
     * @return mixed
     * @throws \Exception
     */
    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        //If registering new user check password
        if ($args['method'] == 'ADD' && !isset($args['password'])){
            throw new \Exception(json_encode('Cannot register without password'));
        }

        $context->request->merge(array_merge($args['user'],$args));

        $fn = $args['method'];
        return $this->$fn($context->request,$context->request->id ?? $context->request->id);
    }
}
