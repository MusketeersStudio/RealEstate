<?php

namespace App\GraphQL\Query;

use App\Services\UserService;
use App\Util\CRUD\HandlesGraphQLQueryRequest;

class User
{
    use HandlesGraphQLQueryRequest;


    public function __construct(UserService $CRUDService)
    {
        $this->CRUDService = $CRUDService;
    }

}
