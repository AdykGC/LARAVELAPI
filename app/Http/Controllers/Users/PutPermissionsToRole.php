<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Requests\Users\putPermissionToRoleRequest;
use App\Http\Controllers\Users\BaseController;

class PutPermissionsToRole extends BaseController {
    public function __invoke(putPermissionToRoleRequest $request) {
        /** @var User $user */
        return $this->service->putPermissionToRole($request);
    }
}