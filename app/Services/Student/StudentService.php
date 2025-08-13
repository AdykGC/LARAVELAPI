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

    public function getInformation (Student $user){
        return response()->json($user);
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