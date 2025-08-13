<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;

class ShowEnrolledCoursesController extends BaseController{
    public function __invoke() {
        /** @var User $user */
        $user = auth()->user();
        return $this->service->getEnrolledCourse($user);
    }
}