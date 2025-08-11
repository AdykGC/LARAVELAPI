<?php namespace App\Services\Teacher;

use Illuminate\Support\Facades\Hash;
use App\Models\{
    Student,
    Courses,
    WebAdmin,
    Teacher,
};

class TeacherService {
    public function postLogin($teac_email, $password){
        $user = Teacher::where('teac_email', $teac_email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 'auth_error',
                'message' => 'Неверное имя пользователя или пароль.',
            ], 401);
        }
        $token = $user->createToken('teacher-token');
        $token->accessToken->expires_at = now()->addDays(3);
        $token->accessToken->save();
        return response()->json([ 
            'message' => 'Вход выполнен успешно',
            'token' => $token,
            'teacher' => [
                'id' => $user->id,
                'full_name' => $user->full_name,
                'teac_email' => $user->teac_email,
                'email' => $user->email, 
            ],
        ]);
    }
    public function postLogout($request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Вы вышли из системы',
        ]);
    }
    public function getInformation($user){
        return response()->json($user);
    }
}