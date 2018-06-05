<?php

namespace App\GraphQL\Mutation;

use App\Services\UnitTypeService;
use App\Util\CRUD\HandlesGraphQLMutationRequest;
use GraphQL\Type\Definition\ResolveInfo;

class Unit_Type
{
    use HandlesGraphQLMutationRequest;

    public function __construct(UnitTypeService $CRUDService)
    {
        $this->CRUDService = $CRUDService;
    }

    /**
     * Resolve the mutation.
     *
     * @param  mixed $root
     * @param  array $args
     * @return mixed
     */
    public function resolve($root, array $args, $context, ResolveInfo $info)
    {
        $context->request->merge($args['unit_type']);

        $fn = $args['method'];
        try{
            return $this->$fn();
        }catch (\Exception $e){
            return $e;
        }

    }

}
