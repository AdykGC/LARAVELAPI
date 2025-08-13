<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;
use App\Http\Requests\Users\createCourseRequest;

class CreateCourseController extends BaseController{
    public function __invoke(createCourseRequest $request) {
        /** @var User $user */
        return $this->service->postCreateCourse($request);
    }
}
