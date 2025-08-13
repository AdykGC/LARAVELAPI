<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;
use Illuminate\Http\Request;

class LogoutUsersController extends BaseController {
    public function __invoke(Request $request) {
        /** @var User $user */
        $request->user()->currentAccessToken()->delete();
        return $this->service->postLogout();
    }
}