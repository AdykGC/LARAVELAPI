<?php namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\Student\BaseController;
use App\Http\Requests\Student\updateProfileRequest;

class updateProfileController extends BaseController {
    public function __invoke(updateProfileRequest $request) {
        /** @var Student $user */
        $user = auth()->user();
        return $this->service->patchProfile($user, $request->validated());
    }
}
