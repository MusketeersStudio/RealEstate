<?php

namespace App\GraphQL\Mutation;

use App\Services\UserService;
use App\Util\CRUD\HandlesGraphQLCRUDRequest;
use App\Util\CRUD\HandlesGraphQLMutationRequest;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Http\Request;

class Property extends Mutation
{
    use HandlesGraphQLMutationRequest;

    protected $attributes = [
        'name' => 'property',
        'description' => 'A mutation'
    ];

    /**
     * @var $request \Illuminate\Http\Request
     */
    protected $request;

    public function __construct($attributes = [],Request $request,UserService $CRUDService)
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
            'property' => [
                'type' => GraphQL::type('property'),
                'rules' => ['required']
            ]
        ];
    }

    /**
     * Type that mutation returns.
     *
     * @return ObjectType
     */
    public function type()
    {
        return GraphQL::type('property');
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
        $this->request->merge($args['property']);

        $fn = $args['method'];
        try{
            return $this->$fn();
        }catch (\Exception $e){
            return $e;
        }

    }
}
