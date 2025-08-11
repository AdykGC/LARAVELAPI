<?php namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Models\Courses;
use App\Http\Controllers\Controller;

class TEAunenrollController extends Controller {
    public function __invoke($course_id) {
        /** @var Teacher $user */
        $user = auth()->user();
        /* ЛОГИКА SAC */

        $courses = Courses::find($course_id);
        if (!$courses) { 
            abort(response()->json([
                'message' => 'Курс не найден, удален или не существует'
                ], 404));
        }
        if (!$user->isEnrolledIn($course_id)) {
            return response()->json(['message' => 'Вы не зарегистрированы на этот курс.'], 409);
        }
        $user->courses()->detach($course_id);
        return response()->json([
            'message' => 'Вы успешно отказались от курса.'
        ]);
    }
}
