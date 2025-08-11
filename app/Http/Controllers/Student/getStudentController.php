<?php namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\Student\BaseController;

class getStudentController extends BaseController {
    public function __invoke(){
        /** @var Student $user */
        $user = auth()->user();
        return $this->service->getInformation($user);
    }
}