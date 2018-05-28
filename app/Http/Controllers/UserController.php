<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Util\CRUD\HandlesCRUDRequest;

class UserController extends Controller
{
    use HandlesCRUDRequest;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
//        $this->middleware('guest');
        $this->CRUDService = $userService;

        $this->addValidationRules = [
            'role' => 'required|string|max:191',
            'sub_role' => 'nullable|string|max:191',
            'full_name' => 'required|string|max:255',
            'status' => 'required|integer|max:2',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'tel' => 'nullable|string|min:10',
            'alt_tel'  => 'nullable|string|min:10',
            'national_id' => 'required|string|min:6',
        ];

        $this->updateValidationRules = [
            'role' => 'nullable|string|max:191',
            'sub_role' => 'nullable|string|max:191',
            'full_name' => 'nullable|string|max:255',
            'status' => 'required|integer|max:2',
            'email' => 'nullable|string|email|max:255|unique:users',
            'tel' => 'nullable|string|min:10',
            'alt_tel'  => 'nullable|string|min:10',
            'national_id' => 'nullable|string|min:6',
        ];
    }
}
