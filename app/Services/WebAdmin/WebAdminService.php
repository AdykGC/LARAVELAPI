<?php namespace App\Services\WebAdmin;

use Illuminate\Support\Facades\Hash;
use App\Models\{
    Student,
    Courses,
    WebAdmin,
    Teacher,
};

class WebAdminService {
    public function postRegister($full_name, $email, $phone, $username, $password){
        $user = WebAdmin::create([
            'full_name' => $full_name,
            'email' => $email,
            'phone' => $phone,
            'username' => $username,
            'password' => Hash::make($password),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Администратор успешно зарегистрирован',
            'admin' => $user 
        ]);
    }
    public function postLogin(string $username, string $password){
        $user = WebAdmin::where('username', $username)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 'auth_error',
                'message' => 'Неверное имя пользователя или пароль.',
            ], 401);
        }
        $token = $user->createToken('admin-token');
        $token->accessToken->expires_at = now()->addDays(3);
        $token->accessToken->save();
        return response()->json([ 
            'message' => 'Вход выполнен успешно',
            'token' => $token,
            'Admin' => [
                'id' => $user->id,
                'full_name' => $user->full_name,
                'username' => $user->username,
                'email' => $user->email, 
            ],
        ]);
    }
    public function postLogout(){
        return response()->json([
            'status' => 'success',
            'message' => 'Вы вышли из системы',
        ]);
    }
    public function getStudentInformation (){
        return response()->json(Student::all());
    }
    public function getTeacherInformation (){
        return response()->json(Teacher::all());
    }
    public function getCoursesInformation (){
        return response()->json(Courses::all());
    }
    public function getWebAdminInformation ($user){
        return response()->json($user);
    }
    public function postCreateStudent($request){
        $data = Student::create([
            'full_name'     => $request->full_name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'birth_date'    => $request->birth_date,
            'address'       => $request->address,
            'gender'        => $request->gender,
            'avatar'        => $request->avatar,
            'status'        => $request->status ?? 'active',
            'gpa'           => $request->gpa,
            'credits'       => $request->credits,
            'faculty_id'    => $request->faculty_id,
            'major_id'      => $request->major_id,
            'stud_email'    => $request->stud_email,
            'password'      => Hash::make($request->password),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Студент успешно создан',
            'student' => $data,
        ], 201);
    }
    public function postCreateTeacher($request){
        $data = Teacher::create([
            'full_name'     => $request->full_name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'birth_date'    => $request->birth_date,
            'address'       => $request->address,
            'gender'        => $request->gender,
            'avatar'        => $request->avatar,
            'faculty_id'    => $request->faculty_id,
            'major_id'      => $request->major_id,
            'teac_email'    => $request->teac_email,
            'password'      => Hash::make($request->password),
        ]);
        return response()->json([ 
            'status' => 'success',
            'message' => 'Преподователь успешно создан',
            'student' => $data,
        ], 201);
    }
    public function postCreateCourse($request){
        $data = Courses::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'credits'       => $request->credits,
            'status'        => $request->status ?? 'active',
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Курс успешно создан',
            'Курс' => $data 
        ]);
    }
}