<?php namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\WebAdmin\BaseController;
use App\Models\WebAdmin;

class getTeachersController extends BaseController{
    public function __invoke() {
        /** @var WebAdmin $user */
        return $this->service->getTeacherInformation();
    }
}
