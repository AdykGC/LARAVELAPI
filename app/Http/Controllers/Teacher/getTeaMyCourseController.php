<?php namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Http\Controllers\Controller;

class getTeaMyCourseController extends Controller {
    public function __invoke() {
        /** @var Teacher $user */
        $user = auth()->user();
        /* ЛОГИКА SAC */

        return response()->json([
            'status' => 'success',
            'Teacher' => $user->full_name,
            'courses' => $user->courses,
        ]);
    }
}
