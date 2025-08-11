<?php namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\Student\BaseController;
use Illuminate\Http\Request;

class logoutController extends BaseController {
    public function __invoke(Request $request) {
        /** @var Student $user */
        $request->user()->currentAccessToken()->delete();
        return $this->service->postLogout();
    }
}