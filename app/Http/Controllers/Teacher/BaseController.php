<?php namespace App\Http\Controllers\Teacher;

use App\Services\Teacher\TeacherService;

class BaseController {
    public $service;
    public function __construct(TeacherService $service){
        $this->service = $service;
    }
}