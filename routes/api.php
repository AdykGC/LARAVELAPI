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


// Защищённые маршруты
Route::middleware('auth:sanctum')->group(function () {
    // для всех пользователей в системе
    Route::get('/courses',                    getCoursesController::class);
});
#
#
#
#
Route::post('/register',                  RegisterUsersController::class);
Route::post('/login',                     LoginUsersController::class);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',                             LogoutUsersController::class);
    # SHOW
    Route::get('/showRoles',                           ShowRolesController::class);
    Route::get('/showPermissions',                     ShowPermissionsController::class);
    Route::get('/showPermissionsByRole',               ShowPermissionsByRoleController::class);
    Route::get('/showStudents',                        ShowStudentsListController::class);
    Route::get('/showTeachers',                        ShowTeachersListController::class);
    Route::get('/showWebAdmins',                       ShowWebsiteAdminsListController::class);
    # INFORMATION
    Route::get('/showMe',                              InformationCurrentUser::class);
    # UPDATE
    Route::put('/putPermissionsToRole',                PutPermissionsToRole::class);
    Route::put('/putAnotherRoleToUser',                PutAnotherRoleToUser::class);
    Route::post('/createCourseController',             CreateCourseController::class);
    Route::post('/createUserController',               CreateUserController::class);
    Route::get('/courses/my',                          ShowEnrolledCoursesController::class);
    Route::post('/courses/enroll',                     EnrollToCourseController::class);
    Route::post('/courses/unenroll',                   UnenrollToCourseController::class);


});
#Route::middleware(['auth:sanctum', 'student'])->group(function () {
#    Route::patch('/student/profile',          updateProfileController::class);
#    Route::post('/student/ETC/{ID}',          enrollCourseController::class);
#    Route::post('/student/UETC/{ID}',         unenrollCourseController::class);
#    Route::get('/student/my/course',          getMyCourseController::class);
#    Route::post('/student/my/course/{ID}',    getMyCourseByIDController::class);
#});
#
#
#
##
#Route::post('/teacher/login',                  TEAloginController::class);
#Route::middleware(['auth:sanctum', 'teacher'])->group(function () {

#    Route::post('/teacher/logout',            TEAlogoutController::class);
#    Route::post('/teacher/ETC/{ID}',          TEAenrollController::class);
#    Route::post('/teacher/UETC/{ID}',         TEAunenrollController::class);
#    Route::get('/teacher/my/course',          getTeaMyCourseController::class);
#    Route::post('/teacher/my/course/{ID}',    getTeaMyCourseByIDController::class);
#});