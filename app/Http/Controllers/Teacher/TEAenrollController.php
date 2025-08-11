<?php namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Models\Courses;
use App\Http\Controllers\Controller;

class TEAenrollController extends Controller {
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
        if($user->courses()->where('course_id', $course_id)->exists()) {
            return response()->json([
                'message' => 'Вы уже зарегистрированы на этот курс',
                'Данный курс' => $courses,
                'Все курсы' => $user->courses
                ], 409);
        }
        $user->courses()->attach($course_id);
        return response()->json([
            'message' => 'Регистрация прошла успешно' ,
            'Course' => $courses 
        ],200);
    }
}
