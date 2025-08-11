<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\{
    getStudentController,
    loginController,
    logoutController,
    updateProfileController,
    enrollCourseController,
    unenrollCourseController,
    getMyCourseController,
    getMyCourseByIDController,
};
use App\Http\Controllers\Teacher\{
    getTeacherController,
    TEAloginController,
    TEAlogoutController,
    TEAenrollController,
    TEAunenrollController,
    getTeaMyCourseController,
    getTeaMyCourseByIDController,
};
use App\Http\Controllers\WebAdmin\{
    getAdminController,
    getStudentsController,
    getTeachersController,
    ADMgetCoursesController,
    ADMloginController,
    ADMregisterController,
    ADMlogoutController,
    ADMcreateStudController,
    ADMcreateTeacController,
    ADMcreateCourController,
};
use App\Http\Controllers\Courses\{
    getCoursesController,
};


// Защищённые маршруты
Route::middleware('auth:sanctum')->group(function () {
    // для всех пользователей в системе
    Route::get('/courses',                    getCoursesController::class);
});
#
#
#
#
Route::post('/student/login',        loginController::class); 
Route::middleware(['auth:sanctum', 'student'])->group(function () {
    Route::get('/student/dashboard',          getStudentController::class);
    Route::post('/student/logout',            logoutController::class);
    Route::patch('/student/profile',          updateProfileController::class);
    Route::post('/student/ETC/{ID}',          enrollCourseController::class);
    Route::post('/student/UETC/{ID}',         unenrollCourseController::class);
    Route::get('/student/my/course',          getMyCourseController::class);
    Route::post('/student/my/course/{ID}',    getMyCourseByIDController::class);
});
#
#
#
#
Route::post('/teacher/login',                  TEAloginController::class);
Route::middleware(['auth:sanctum', 'teacher'])->group(function () {
    Route::get('/teacher/dashboard',          getTeacherController::class);
    Route::post('/teacher/logout',            TEAlogoutController::class);
    Route::post('/teacher/ETC/{ID}',          TEAenrollController::class);
    Route::post('/teacher/UETC/{ID}',         TEAunenrollController::class);
    Route::get('/teacher/my/course',          getTeaMyCourseController::class);
    Route::post('/teacher/my/course/{ID}',    getTeaMyCourseByIDController::class);
});
#
#
#
#
Route::post('/admin/login',                   ADMloginController::class);
Route::post('/admin/register',                ADMregisterController::class);
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/dashboard',            getAdminController::class);
    Route::get('/admin/students',            getStudentsController::class);
    Route::get('/admin/teachers',            getTeachersController::class);
    Route::get('/admin/courses',            ADMgetCoursesController::class);
    Route::post('/admin/logout',              ADMlogoutController::class);
    Route::post('/admin/create/students',     ADMcreateStudController::class);
    Route::post('/admin/create/teachers',     ADMcreateTeacController::class);
    Route::post('/admin/create/course',       ADMcreateCourController::class);
});