<?php
/**
 * Created by PhpStorm.
 * User: erick
 * Date: 5/28/18
 * Time: 10:20 PM
 */

namespace App\Util\CRUD;

use Exception;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

trait HandlesGraphQLMutationRequest
{
    /**
     * @var $CRUDService \App\Util\CRUD\HandlesCRUD
     */
    protected $CRUDService;

    /**
     * Store a newly created resource in storage.
     * @return Model
     * @throws Exception
     */
    public function ADD(){
        if($this->CRUDService->add($this->request)){
            return $this->CRUDService->info['added'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }

    /**
     * Update the specified resource in storage.
     * @return Model
     * @throws Exception
     */
    public function UPDATE(){
        if($this->CRUDService->update($this->request,$this->request->id)){
            return $this->CRUDService->info['updated'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Model
     * @throws Exception
     */
    public function DELETE(){
        if($this->CRUDService->delete($this->request,$this->request->id)){
            return $this->CRUDService->info['deleted'];
        }else{
            throw new Exception(json_encode($this->CRUDService->errors));
        }
    }
}