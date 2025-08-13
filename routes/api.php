<?php use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Courses\{
    getCoursesController,
};
use App\Http\Controllers\Users\{
    RegisterUsersController,
    LoginUsersController,
    LogoutUsersController,
    ShowRolesController,
    ShowPermissionsController,
    ShowPermissionsByRoleController,
    ShowStudentsListController,
    ShowTeachersListController,
    ShowWebsiteAdminsListController,
    InformationCurrentUser,
    PutPermissionsToRole,
    PutAnotherRoleToUser,
    CreateCourseController,
    CreateUserController,
    EnrollToCourseController,
    ShowEnrolledCoursesController,
    UnenrollToCourseController,
};
use Illuminate\Support\Facades\Request;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',                  RegisterUsersController::class);
Route::post('/login',                     LoginUsersController::class);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',                             LogoutUsersController::class);
    Route::get('/showMe',                              InformationCurrentUser::class);
    Route::get('/courses',                    getCoursesController::class);
});

Route::group(['middleware' => function ($request, $next) {
    if (! ($request->user()->can('A') || $request->user()->can('B'))) {
        abort(403);
    }
    return $next($request);
}], function () {
    Route::get('/showMe', InformationCurrentUser::class);
    Route::get('/courses/my', ShowEnrolledCoursesController::class);
    Route::post('/courses/enroll', EnrollToCourseController::class);
    Route::post('/courses/unenroll', UnenrollToCourseController::class);
});

Route::middleware('can:EDIT | ALL')->group(function () {
    Route::put('/putPermissionsToRole',                PutPermissionsToRole::class);
    Route::post('/create/courses',                     CreateCourseController::class);
    Route::post('/create/users',                       CreateUserController::class);
    Route::get('/showWebAdmins',                       ShowWebsiteAdminsListController::class);
    Route::get('/showTeachers',                        ShowTeachersListController::class);
    Route::get('/showPermissions',                     ShowPermissionsController::class);
    Route::put('/putAnotherRoleToUser',                PutAnotherRoleToUser::class);
});

Route::middleware('can:View | ALL')->group(function () {
    Route::get('/showPermissionsByRole',               ShowPermissionsByRoleController::class);
    Route::get('/showRoles',                           ShowRolesController::class);
    Route::get('/showStudents',                        ShowStudentsListController::class);
});