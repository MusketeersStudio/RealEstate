<?php

namespace App\Http\Controllers\Property;

use App\Services\PropertyService;
use App\Util\CRUD\HandlesCRUDRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    use HandlesCRUDRequest;

    public function __construct(PropertyService $propertyService){
        $this->CRUDService = $propertyService;

        $this->addValidationRules = [
            'user_id' => 'required|integer',
            'property_type_id' => 'required|integer',
            'name' => 'required|string',
            'status' => 'required|integer',
            'description' => 'nullable|string',
            'unit_prefix' => 'required|string',
            'total_units' => 'required|integer',
        ];

        $this->updateValidationRules = [
            'status' => 'required|integer',
        ];
    }
}
