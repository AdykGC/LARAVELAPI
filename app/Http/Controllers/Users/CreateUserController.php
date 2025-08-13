<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;
use App\Http\Requests\Users\createUserRequest;

class CreateUserController extends BaseController{
    public function __invoke(createUserRequest $request) {
        /** @var User $user */
        return $this->service->postCreateUser($request);
    }
}
