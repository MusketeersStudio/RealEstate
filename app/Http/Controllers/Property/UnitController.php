<?php

namespace App\Http\Controllers\Property;

use App\Services\UnitService;
use App\Util\CRUD\HandlesCRUDRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    use HandlesCRUDRequest;

    public function __construct(UnitService $propertyTypeService){
        $this->CRUDService = $propertyTypeService;

        $this->addValidationRules = [
            'user_id'  => 'required|integer',
            'property_id'  => 'required|integer',
            'unit_type_id'  => 'required|integer',
            'name' => 'required|string',
            'status' => 'required|integer',
            'description' => 'nullable|string',
        ];

        $this->updateValidationRules = [
            'status' => 'required|integer',
        ];
    }
}
