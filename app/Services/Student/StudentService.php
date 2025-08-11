<?php namespace App\Services\Student;

use Illuminate\Support\Facades\Hash;
use App\Models\{
    Student,
    Courses,
};

class StudentService {
    public function getCourse (Student $user){
        return response()->json([
            'status' => 'success',
            'student' => $user->full_name,
            'courses' => $user->courses
        ]);
    }
    public function getCourseById (Student $user, int $courseId){
        $course = $user->courses()->where('courses.id', $courseId)->first();
        if (!$course) {
            return response()->json([
                'status' => 'error',
                'message' => 'Студент не записан на курс'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'student' => $user->full_name,
            'courses' => $course
        ]);
    }
    public function postEnroll (Student $user, int $course_id){
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
        if (!$user->hasCreditCapacityFor($courses)) {
            return response()->json([
                'message' => 'Превышен лимит кредитов',
                'макс_кредиты' => $user->max_credits ?? 21,
                'текущие_кредиты' => $user->totalEnrolledCredits(),
                'курс_кредиты' => $courses->credits,
            ], 409);
        }
        $user->courses()->attach($course_id);
        return response()->json([
            'message' => 'Регистрация прошла успешно' ,
            'Course' => $courses 
        ],200);
    }
    public function postUnenroll (Student $user, int $course_id){
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
        return response()->json(['message' => 'Вы успешно отказались от курса.']);
    }
    public function getInformation (Student $user){
        return response()->json($user);
    }
    public function postLogin(string $email, string $password){
        $user = Student::where('stud_email', $email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 'auth_error',
                'message' => 'Неверное имя пользователя или пароль.',
            ], 401);
        }

        $token = $user->createToken('student-token');
        $token->accessToken->expires_at = now()->addDays(3);
        $token->accessToken->save();
        $user->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->ip(),
        ]);
        return response()->json([
            'message' => 'Вход выполнен успешно',
            'token' => $token,
            'student' => [
                'id' => $user->id,
                'full_name' => $user->full_name,
                'stud_email' => $user->stud_email,
                'email' => $user->email,
                'last_login_at' => $user->last_login_at,
                'last_login_ip' => $user->last_login_ip,
            ],
        ]);
    }
    public function postLogout(){
        return response()->json(['status' => 'success','message' => 'Вы вышли из системы',]);
    }
    public function patchProfile(Student $user, array $data){
        if (empty($data)) {
            return response()->json([ 'message' => 'Нет данных для обновления.' ], 422);
        }
        $user->update($data);
        return response()->json([
            'message' => 'Профиль успешно обновлён',
            'student' => $user,
        ]);
    }
}