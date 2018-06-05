<?php
/**
 * Created by PhpStorm.
 * User: erick
 * Date: 5/23/18
 * Time: 2:37 PM
 */

namespace App\Services;


use App\Util\CRUD\CRUDService;
use App\Util\CRUD\HandlesCRUD;

class UnitService implements CRUDService
{
    use HandlesCRUD;

    /**
     * Initialize pic-path and pic-type
     */
    public function __construct(){

        $this->picType = $this->getModelType(); //Default polymorphic name is the full namespace
        $this->picPath = 'unitPics';

        /* $this->docType = $this->getModelType(); //Default polymorphic name is the full namespace
         $this->docPath = 'userDocs';*/
    }

    public function getModelType()
    {
        return 'App\Models\Unit';
    }

    public function getEventChannel()
    {
        return 'unit';
    }
}