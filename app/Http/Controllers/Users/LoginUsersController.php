<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Requests\Users\loginRequest;
use App\Http\Controllers\Users\BaseController;

class LoginUsersController extends BaseController {
    public function __invoke(loginRequest $request) {
        /** @var User $user */
        $university_email = $request->university_email;
        $password = $request->password;
        return $this->service->postLogin($university_email, $password);
    }
}