<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;

class ShowPermissionsByRoleController extends BaseController {
    public function __invoke() {
        /** @var User $user */
        return $this->service->getPermissionsByRole();
    }
}