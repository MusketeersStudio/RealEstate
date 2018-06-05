<?php

namespace App\GraphQL\Mutation;

use App\Services\PropertyTypeService;
use App\Util\CRUD\HandlesGraphQLMutationRequest;
use GraphQL\Type\Definition\ResolveInfo;

class Property_Type
{
    use HandlesGraphQLMutationRequest;

    public function __construct(PropertyTypeService $CRUDService)
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
        $context->request->merge($args['property_type']);

        $fn = $args['method'];
        try{
            return $this->$fn($context->request);
        }catch (\Exception $e){
            return $e;
        }

    }
}
