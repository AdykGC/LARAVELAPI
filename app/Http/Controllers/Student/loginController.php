<?php namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Requests\Student\loginRequest;
use App\Http\Controllers\Student\BaseController;

class loginController extends BaseController {
    public function __invoke(loginRequest $request) {
        /** @var Student $user */
        $email = $request->stud_email;
        $password = $request->password;
        return $this->service->postLogin($email, $password);
    }
}
