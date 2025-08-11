<?php namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Http\Controllers\Teacher\BaseController;

class getTeacherController extends BaseController{
    public function __invoke() {
        /** @var Teacher $user */
        return $this->service->getInformation(auth()->user());
    }
}
