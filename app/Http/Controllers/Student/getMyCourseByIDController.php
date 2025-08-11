<?php namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\Student\BaseController;

class getMyCourseByIDController extends BaseController {
    public function __invoke($course_id) {
        /** @var Student $user */
        $user = auth()->user();
        return $this->service->getCourseById($user,$course_id);
    }
}
