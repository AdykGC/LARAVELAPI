<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Requests\Users\putAnotherRoleToUserRequest;
use App\Http\Controllers\Users\BaseController;

class PutAnotherRoleToUser extends BaseController {
    public function __invoke(putAnotherRoleToUserRequest $request) {
        /** @var User $user */
        return $this->service->putAnotherRoleToUser($request);
    }
}