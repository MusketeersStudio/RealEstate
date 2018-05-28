<?php
/**
 * Created by PhpStorm.
 * User: erick
 * Date: 9/30/17
 * Time: 2:13 PM
 */

namespace App\Util\CRUD;

use App\Traits\DoesResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

trait HandlesCRUDRequest
{
    use DoesResponses;

    protected $CRUDService;

    //TODO: make dynamic adding and updating validation rules
    protected $addValidationRules;
    protected $updateValidationRules;


    /**
     * Fetch all Models without any restriction.
     *
     * @return \Illuminate\Http\JsonResponse
     * @internal param $id
     */
    public function getAll(){
        return $this->successResponse($this->CRUDService->getAll());
    }

    /**
     * Fetch a Model without any restriction.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id){
        return $this->successResponse($this->CRUDService->get($id));
    }

    /**
     * Store a newly created Model in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request){
        $this->validate($request,$this->addValidationRules);

        if($this->CRUDService->add($request)){
            return $this->successResponse($this->CRUDService->info);
        }else{
            return $this->errorResponse($this->CRUDService->errors,$this->CRUDService->info);
        }
    }

    /**
     * Update the specified Model in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,$this->updateValidationRules);

        if($this->CRUDService->update($request,$id)){
            return $this->successResponse($this->CRUDService->info);
        }else{
            return $this->errorResponse($this->CRUDService->errors,$this->CRUDService->info);
        }
    }

    /**
     * Remove the specified Model from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id){
        if($this->CRUDService->delete($request, $id)){
            return $this->successResponse($this->CRUDService->info);
        }else{
            return $this->errorResponse($this->CRUDService->errors,$this->CRUDService->info);
        }
    }



}