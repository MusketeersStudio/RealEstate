<?php

namespace App\Http\Controllers\Property;

use App\Services\PropertyTypeService;
use App\Util\CRUD\HandlesCRUDRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyTypeController extends Controller
{
    use HandlesCRUDRequest;

    public function __construct(PropertyTypeService $propertyTypeService){
        $this->CRUDService = $propertyTypeService;

        $this->addValidationRules = [
            'name' => 'required|string',
            'description' => 'required|string',
        ];

        $this->updateValidationRules = [];
    }
}
