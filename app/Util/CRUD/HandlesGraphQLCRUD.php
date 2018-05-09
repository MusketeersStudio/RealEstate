<?php
/**
 * Created by PhpStorm.
 * User: erick
 * Date: 10/23/17
 * Time: 12:04 PM
 */

namespace App\Util\CRUD;


use App\Events\CRUDEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait HandlesGraphQLCRUD
{
    //TODO: merge new logic to handlesCrud;
    public $model;

    /**
     * Used to update a Cuisine owned by the current user,
     *
     * @param Request $request
     * @return bool
     * @internal Model $model
     */
    public function gqlAdd(Request $request){
        $model = null;
        $attributes = array_merge(
            $request->only($this->fromSettings('attributes')),
            $this->resolveRelations($request)
        );

        //Add hook before creating
        if(!$this->gqlBeforeCreate($request,$attributes))
            return empty($this->errors);

        $model = call_user_func([$this->getModelType(),'create'],$attributes);
        if($model){
            $this->info['Add']['Successful'] = $model;
        }else{
            $this->errors['Add']['Failed'] = $model;
        }

        //Handle images
        if ($this->fromSettings('hasPicture')){
            if($request->hasFile('image')){
                //TODO: ability to work with temp images and files.
                $this->handleImage($request,$model->id);
            } else {
                $this->defaultImage($model->id);
            }
        }

        //Add hook after creating
        if(!$this->gqlAfterCreate($request,$model))
            return empty($this->errors);

        return empty($this->errors);
    }

    /**
     * Used to update a Cuisine owned by the current user,
     *
     * @param Request $request
     * @param $id
     * @return bool
     */
    public function gqlUpdate(Request $request,$id){
        //Add hook before update
        if(!$this->gqlBeforeUpdate($request,$id))
            return empty($this->errors);

        if($model = $this->getModelAccordingToParent($request,$id)) {
            if ($model->update($request->only($this->fromSettings('attributes')))) {
                $this->info['Update']['Successful'] = $model;
            } else {
                $this->errors['Update']['Failed'] = $model;
            }
        }

        //Add hook after update
        if(!$this->gqlAfterUpdate($request,$model))
            return empty($this->errors);

        return empty($this->errors);
    }

    /**
     * Used to delete a Cuisine owned by the current user,
     *
     * @param Request $request
     * @param $id
     * @return bool
     */
    public function gqlDelete(Request $request,$id){
        //Add hook before delete
        if(!$this->gqlBeforeDelete($request,$id))
            return empty($this->errors);

        if($model = $this->getModelAccordingToParent($request,$id)) {
            if ($model->delete()) {
                $this->info['Delete']['Successful'] = $model;
            } else {
                $this->errors['Delete']['Failed'] = $model;
            }
        }

        //Add hook after creating
        if(!$this->gqlAfterDelete($request,$model))
            return empty($this->errors);

        return empty($this->errors);
    }

    /**
     * Fetch all Models without any restriction.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @internal param $id
     */
    public function gqlGetAll(){
        try{
            return call_user_func([$this->getModelType(),'all']);
        }catch (\Exception $e){
            $this->errors['Get']['Failed'] = $e->getMessage();
            return $this->errors;
        }
    }

    /**
     * Fetch a Model without any restriction.
     *
     * @param $id
     * @return array|Model
     */
    public function gqlGet($id){
        try{
            return call_user_func_array([$this->getModelType(),'where'],['id','=',$id])->get();
        }catch (\Exception $e){
            $this->errors['Get']['Failed'] = $e->getMessage();
            return $this->errors;
        }
    }

    //HOOKS
    public function gqlBeforeCreate($request,$attributes){
        //
        return true;
    }

    public function gqlAfterCreate($request,$model){
        $crudEvent = new CRUDEvent();
        $crudEvent->setPayload([
            'crudType' => 'created',
            'channel' => $this->getEventChannel(),
            'model' => $model
        ]);
        broadcast($crudEvent)->toOthers();
        return true;
    }

    public function gqlBeforeUpdate($request,$attributes){
        //
        return true;
    }

    public function gqlAfterUpdate($request,$model){
        $crudEvent = new CRUDEvent();
        $crudEvent->setPayload([
            'crudType' => 'updated',
            'channel' => $this->getEventChannel(),
            'model' => $model
        ]);
        broadcast($crudEvent)->toOthers();
        return true;
    }

    public function gqlBeforeDelete($request,$attributes){
        //
        return true;
    }

    public function gqlAfterDelete($request,$model){
        $crudEvent = new CRUDEvent();
        $crudEvent->setPayload([
            'crudType' => 'deleted',
            'channel' => $this->getEventChannel(),
            'model' => $model
        ]);
        broadcast($crudEvent)->toOthers();
        return true;
    }
}