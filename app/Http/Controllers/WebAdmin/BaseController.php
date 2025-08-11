<?php namespace App\Http\Controllers\WebAdmin;

use App\Services\WebAdmin\WebAdminService;

class BaseController {
    public $service;
    public function __construct(WebAdminService $service){
        $this->service = $service;
    }
}