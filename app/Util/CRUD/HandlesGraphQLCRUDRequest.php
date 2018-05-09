<?php

namespace App\Util\CRUD;

use Exception;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait HandlesGraphQLCRUDRequest
{
    protected $CRUDService;

    /**
     * Store a newly created resource in storage.
     * @return Model
     * @throws Exception
     */
    public function Add(){
        if($this->CRUDService->gqlAdd($this->request)){
            return $this->CRUDService->info['Add']['Successful'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }

    /**
     * Update the specified resource in storage.
     * @return Exception|Model
     * @throws Exception
     */
    public function Update(){
        if($this->CRUDService->gqlUpdate($this->request,$this->request->id)){
            return $this->CRUDService->info['Update']['Successful'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Exception|Model
     * @throws Exception
     */
    public function Delete(){
        if($this->CRUDService->gqlDelete($this->request,$this->request->id)){
            return $this->CRUDService->info['Delete']['Successful'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }

    /**
     * Available arguments on mutation.
     *
     * @return array
     */
    public function args()
    {
        return [
            'type' => [
                'type' => Type::string()
            ],
            'raw' => [
                'type' => Type::string()
            ]
        ];
    }

    /**
     * Resolve the mutation.
     *
     * @param  mixed $root
     * @param  array  $args
     * @return mixed
     */
    public function resolve($root, array $args)
    {
        $raw = json_decode($args['raw'],true);

        $this->request->merge($raw);

        $fn = $args['type'];

        try{
            return $this->$fn();
        }catch (Exception $e){
            return $e;
        }

    }

}