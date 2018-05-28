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

class Payment_Plan extends Mutation
{
    use HandlesGraphQLMutationRequest;

    protected $attributes = [
        'name' => 'payment_plan',
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
            'payment_plan' => [
                'type' => GraphQL::type('payment_plan'),
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
        return GraphQL::type('payment_plan');
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
        $this->request->merge($args['payment_plan']);

        $fn = $args['method'];
        try{
            return $this->$fn();
        }catch (\Exception $e){
            return $e;
        }
    }
}
