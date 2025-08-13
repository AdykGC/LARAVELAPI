<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Requests\Users\registerRequest;
use App\Http\Controllers\Users\BaseController;

class RegisterUsersController extends BaseController {
    public function __invoke(registerRequest $request) {
        /** @var User $user */
        return $this->service->postRegister($request);
    }
}