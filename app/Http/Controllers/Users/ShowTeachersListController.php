<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;

class ShowTeachersListController extends BaseController {
    public function __invoke() {
        /** @var User $user */
        return $this->service->getTeachers();
    }
}