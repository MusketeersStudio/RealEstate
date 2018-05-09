<?php
/**
 * Created by PhpStorm.
 * User: erikn
 * Date: 9/25/2017
 * Time: 9:51 AM
 */

namespace App\Util\CRUD;


trait HasErrorsAndInfo
{

    /**
     * Errors found in processing services.
     *
     * */
    public $errors = [];

    /**
     * Information after processing services.
     *
     * */
    public $info = [];
}