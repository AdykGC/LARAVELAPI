<?php namespace App\Http\Controllers\Courses;

use App\Models\Courses;
use App\Http\Controllers\Controller;

class getCoursesController extends Controller {
    public function __invoke() {
        return response()->json(Courses::all());
    }
}
