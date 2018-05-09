<?php
/**
 * Created by PhpStorm.
 * User: erikn
 * Date: 9/22/2017
 * Time: 9:04 AM
 */

namespace App\Util\CRUD;


use App\Events\CRUDEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

trait HandlesCRUD
{
    use HandlesImages, HasErrorsAndInfo ;

    /**
     * Fetch model's CRUD settings
     *
     * @param $key
     * @return mixed
     */
    private function fromSettings($key){
        return (call_user_func([$this->getModelType(),'crudSettings']))[$key];
    }

    /**
     * Fetch model according to the owner. Returns only one model.
     * Models that are authorized to modify or delete this model are
     *  - User who owns the model.
     *  - User who created the model.
     *  - User with higher authority to do data manipulation. (eg. SYSTEM).
     *
     * The request must contain the owner key in order to modify the model.
     *
     * @param Request $request
     * @param $id
     * @return bool|Model
     */
    private function getModel(Request $request, $id){
        //Start query building
        $model = call_user_func_array([$this->getModelType(),'where'],['id','=',$id]); //fetch with models id

        //CHECK FOR OWNER
        foreach ($this->fromSettings('owner') as $key => $value){
            if ($request->has($key)){
                $model->where($key,'=',$request->{$key});
            }else if($value){
                //for root nodes that have no owner (i.e property type)
                $model->where($key,'=',$value);
            }else{
                $model->where($key,'=',null); //refuse
            }
        }
        //TODO: CHECK FOR AUTHORITY (i.e. SYSTEM based operation)

        $model = $model->get()->first(); //execute query
        if(!$model){
            $this->errors['not_authorized'][] = $id;
            return false;
        }

        return $model;
    }

    /**
     * Used to resolve the relationships of the model. This means fetching
     * the relevant ids of the foreign columns. The request must contain the
     * relation keys.
     *
     * @param Request $request
     * @return array
     */
    private function resolveForeignKeys(Request $request){
        $relations = array();
        foreach ($this->fromSettings('foreign_keys') as $key) {

            if ($request->has($key)){
                $relations[$key] = $request->{$key};
                continue;
            }
        }
        return $relations;
    }

    /**
     * Encrypt any attribute that has password as key.
     * @param $attributes
     */
    private function handlePassword(&$attributes){
        $attributes['password'] = bcrypt($attributes['password']);
    }

    /**
     * Add a Model.
     *
     * @param Request $request
     * @internal Model $model
     * @return bool
     */
    public function add(Request $request){
        $model = null;
        $attributes = array_merge(
                        $request->only($this->fromSettings('attributes')),
                        $this->resolveForeignKeys($request)
                      );

        //handle passwords
        if (array_key_exists('password',$attributes)){
            $this->handlePassword($attributes);
        }

        //Add hook before creating
        if(!$this->beforeCreate($request,$attributes))
            return empty($this->errors);

        //PERSIST
        $model = call_user_func([$this->getModelType(),'create'],$attributes);
        if($model){
            $this->info['added'][] = $model->id;
        }else{
            $this->errors['not_added'][] = $model->id;
        }

        //Add hook after creating
        if(!$this->afterCreate($request,$model))
            return empty($this->errors);

        return empty($this->errors);
    }

    /**
     * Update a Model
     *
     * @param Request $request
     * @param $id
     * @return bool
     */
    public function update(Request $request,$id){
        //Add hook before update
        if(!$this->beforeUpdate($request,$id))
            return empty($this->errors);

        //UPDATE
        if($model = $this->getModel($request,$id)) {
            if ($model->update($request->only($this->fromSettings('attributes')))) {
                $this->info['updated'][] = $id;
            } else {
                $this->errors['not_updated'][] = $id;
            }
        }

        //Add hook after update
        if(!$this->afterUpdate($request,$model))
            return empty($this->errors);

        return empty($this->errors);
    }

    /**
     * Delete a Model
     *
     * @param Request $request
     * @param $id
     * @return bool
     */
    public function delete(Request $request,$id){
        //Add hook before delete
        if(!$this->beforeDelete($request,$id))
            return empty($this->errors);

        //DELETE
        if($model = $this->getModel($request,$id)) {
            if ($model->delete()) {
                $this->info['deleted'][] = $id;
            } else {
                $this->errors['not_deleted'][] = $id;
            }
        }

        //Add hook after creating
        if(!$this->afterDelete($request,$model))
            return empty($this->errors);

        return empty($this->errors);
    }

    /**
     * Fetch all Models without any restriction.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @internal param $id
     */
    public function getAll(){
        try{
            return call_user_func([$this->getModelType(),'all']);
        }catch (\Exception $e){
            $this->errors['get_failed'] = $e->getMessage();
            return $this->errors;
        }
    }

    /**
     * Fetch a Model without any restriction.
     *
     * @param $id
     * @return array|Model
     */
    public function get($id){
        try{
            return call_user_func_array([$this->getModelType(),'where'],['id','=',$id])->get();
        }catch (\Exception $e){
            $this->errors['get_failed'] = $e->getMessage();
            return $this->errors;
        }
    }

    //HOOKS

    public function beforeCreate($request,$attributes){
        //
        return true;
    }

    public function afterCreate($request,$model){
        $crudEvent = new CRUDEvent();
        $crudEvent->setPayload([
            'crudType' => 'created',
            'channel' => $this->getEventChannel(),
            'model' => $model
        ]);
        broadcast($crudEvent)->toOthers();
        return true;
    }

    public function beforeUpdate($request,$attributes){
        //
        return true;
    }

    public function afterUpdate($request,$model){
        $crudEvent = new CRUDEvent();
        $crudEvent->setPayload([
            'crudType' => 'updated',
            'channel' => $this->getEventChannel(),
            'model' => $model
        ]);
        broadcast($crudEvent)->toOthers();
        return true;
    }

    public function beforeDelete($request,$attributes){
        //
        return true;
    }

    public function afterDelete($request,$model){
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