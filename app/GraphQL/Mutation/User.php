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

class User extends Mutation
{
    use HandlesGraphQLMutationRequest;

    protected $attributes = [
        'name' => 'user',
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
            'user' => [
                'type' => GraphQL::type('user_input'),
                'rules' => ['required']
            ],
            'password' => [
                'type' => Type::string(),
                'rules' => ['nullable','string','min:6']
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
        return GraphQL::type('user');
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

        $this->request->merge(array_merge($args['user'],$args));

        $fn = $args['method'];
        try{
            return $this->$fn();
        }catch (\Exception $e){
            return $e;
        }

    }
}
