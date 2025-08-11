<?php namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Http\Controllers\Student\BaseController;

class unenrollCourseController extends BaseController {
    public function __invoke($course_id) {
        /** @var Student $user */
        $user = auth()->user();
        return $this->service->postUnenroll($user, $course_id);
    }
}
