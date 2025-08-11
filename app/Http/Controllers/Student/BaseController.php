<?php namespace App\Http\Controllers\Student;

use App\Services\Student\StudentService;

class BaseController {
    public $service;
    public function __construct(StudentService $service){
        $this->service = $service;
    }
}