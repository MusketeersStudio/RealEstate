<?php

namespace App\GraphQL\Query;

use App\Services\PropertyTypeService;
use App\Services\UserService;
use App\Util\CRUD\HandlesGraphQLQueryRequest;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use Illuminate\Http\Request;

class Property_Type extends Query
{
    use HandlesGraphQLQueryRequest;

    protected $attributes = [
        'name' => 'property_type',
        'description' => 'A query'
    ];

    /**
     * @var $request \Illuminate\Http\Request
     */
    protected $request;

    public function __construct($attributes = [],Request $request,PropertyTypeService $CRUDService)
    {
        parent::__construct($attributes);
        $this->request = $request;
        $this->CRUDService = $CRUDService;
    }

    public function type()
    {
        return Type::listOf(GraphQL::type('property_type'));
    }
}
