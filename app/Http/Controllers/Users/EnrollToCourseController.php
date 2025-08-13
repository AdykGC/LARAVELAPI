<?php namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Http\Controllers\Users\BaseController;
use App\Http\Requests\Users\enrollToCourseRequest;

class EnrollToCourseController extends BaseController{
    public function __invoke(enrollToCourseRequest $request) {
        /** @var User $user */
        $user = auth()->user();
        return $this->service->postEnrollToCourse($request, $user);
    }
}