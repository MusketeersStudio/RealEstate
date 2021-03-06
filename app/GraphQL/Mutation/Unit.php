<?php

namespace App\GraphQL\Mutation;

use App\Services\UnitService;
use App\Services\UnitTypeService;
use App\Util\CRUD\HandlesGraphQLCRUDRequest;
use App\Util\CRUD\HandlesGraphQLMutationRequest;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Http\Request;

class Unit extends Mutation
{
    use HandlesGraphQLMutationRequest;

    protected $attributes = [
        'name' => 'unit',
        'description' => 'A mutation'
    ];

    /**
     * @var $request \Illuminate\Http\Request
     */
    protected $request;

    public function __construct($attributes = [],Request $request,UnitService $CRUDService)
    {
        parent::__construct($attributes);
        $this->request = $request;
        $this->CRUDService = $CRUDService;
    }

    /**
     * Available arguments on mutation.
     *
     * @return array
     */
    public function args()
    {
        return [
            'method' => [
                'type' => GraphQL::type('mutation_method'),
                'rules' => ['required','string']
            ],
            'unit' => [
                'type' => GraphQL::type('unit'),
                'rules' => ['required']
            ],
        ];
    }

    /**
     * Type that mutation returns.
     *
     * @return ObjectType
     */
    public function type()
    {
        return GraphQL::type('unit');
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
        $this->request->merge($args['unit']);

        $fn = $args['method'];
        try{
            return $this->$fn();
        }catch (\Exception $e){
            return $e;
        }

    }
}
