<?php
/**
 * Created by PhpStorm.
 * User: erick
 * Date: 5/23/18
 * Time: 2:36 PM
 */

namespace App\Services;


use App\Util\CRUD\CRUDService;
use App\Util\CRUD\HandlesCRUD;

class PropertyTypeService implements CRUDService
{
    use HandlesCRUD;

    /**
     * Initialize pic-path and pic-type
     */
    public function __construct(){

    }

    public function getModelType()
    {
        return 'App\Models\Property_Type';
    }

    public function getEventChannel()
    {
        return 'property_type';
    }
}