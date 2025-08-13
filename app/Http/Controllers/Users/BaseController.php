<?php namespace App\Http\Controllers\Users;

use App\Services\Users\UsersService;

class BaseController{
    public $service;
    public function __construct(UsersService $service){
        $this->service = $service;
    }
}