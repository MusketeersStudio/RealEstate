<?php
/**
 * Created by PhpStorm.
 * User: erick
 * Date: 5/28/18
 * Time: 10:08 PM
 */

namespace App\Util\CRUD;


use Exception;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use GraphQL;

trait HandlesGraphQLQueryRequest
{

    /**
     * @var $CRUDService \App\Util\CRUD\HandlesCRUD
     */
    protected $CRUDService;


    /**
     * Fetch a Model without any restriction.
     *
     * @return Model
     * @throws Exception
     */
    public function GET_ONE(){
        if($this->CRUDService->get($this->request,$this->request->id)){
            return $this->CRUDService->info['get'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }

    /**
     * Fetch all Models without any restriction.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function GET_ALL(){
        if($this->CRUDService->getAll($this->request)){
            return $this->CRUDService->info['get_all'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }

    public function args()
    {
        return [
            'method' => [
                'type' => GraphQL::type('query_method'),
                'rules' => ['required','string']
            ],
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['nullable', 'integer']
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['id'])) $this->request->merge($args);

        $fn = $args['method'];
        try{
            return $this->$fn();
        }catch (\Exception $e){
            return $e;
        }
    }
}