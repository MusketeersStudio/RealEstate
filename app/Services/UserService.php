<?php
/**
 * Created by PhpStorm.
 * User: erick
 * Date: 5/6/18
 * Time: 11:59 PM
 */

namespace App\Services;


use App\Util\CRUD\CRUDService;
use App\Util\CRUD\HandlesCRUD;
use Illuminate\Http\Request;

class UserService implements CRUDService
{
    use HandlesCRUD;

    /**
     * Initialize pic-path and pic-type
     */
    public function __construct(){

        $this->picType = $this->getModelType(); //Default polymorphic name is the full namespace
        $this->picPath = 'userPics';

       /* $this->docType = $this->getModelType(); //Default polymorphic name is the full namespace
        $this->docPath = 'userDocs';*/
    }

    public function getModelType()
    {
        return 'App\Models\User';
    }

    public function getEventChannel()
    {
        return 'user';
    }

    public function beforeCreate($request,&$attributes){
        //ADD AUTHORITY
        switch ($request->role){
            case 'ADMIN':
                $attributes['authority'] = 1;
                break;
            case 'PROPERTY_MANAGER':
                $attributes['authority'] = 2;
                break;
            case 'SERVICE_PROVIDER':
                $attributes['authority'] = 3;
                break;

        }
        return true;
    }
}