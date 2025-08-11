<?php namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Http\Controllers\Controller;

class getTeaMyCourseByIDController extends Controller {
    public function __invoke($course_id) {
        /** @var Teacher $user */
        $user = auth()->user();
        /* ЛОГИКА SAC */

        $course = $user->courses()->where('courses.id', $course_id)->first();
        if (!$course) {
            return response()->json([
                'status' => 'success',
                'message' => 'user не записан на курс с таким ID'
            ]);
        }
        return response()->json([
            'status' => 'success',
            'Teacher' => $user->full_name,
            'courses' => $course,
        ]);
    }
}
