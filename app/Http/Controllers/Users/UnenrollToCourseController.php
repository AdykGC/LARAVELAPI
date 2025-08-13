<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;
use App\Http\Requests\Users\unenrollToCourseRequest;

class UnenrollToCourseController extends BaseController{
    public function __invoke(unenrollToCourseRequest $request) {
        /** @var User $user */
        $user = auth()->user();
        return $this->service->postUnenrollToCourse($request, $user);
    }
}