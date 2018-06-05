<?php

namespace App\Http\Controllers\Property;

use App\Services\UnitTypeService;
use App\Util\CRUD\HandlesCRUDRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitTypeController extends Controller
{
    use HandlesCRUDRequest;

    public function __construct(UnitTypeService $unitTypeService){
        $this->CRUDService = $unitTypeService;

        $this->addValidationRules = [
            'property_id' => 'required|integer',
            'size' => 'required|string',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'kitchens' => 'required|integer',
            'sitting_rooms' => 'required|integer',
            'car_spaces' => 'required|string',
        ];

        $this->updateValidationRules = [];
    }
}
