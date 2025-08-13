<?php namespace App\Services\Users;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder\RoleSeeder;

use App\Models\{
    User,
    Courses,
};

use Spatie\Permission\Models\Permission;

class UsersService {
    public function postRegister($request){
        $user = User::create([
            'full_name'          => $request->full_name,
            'university_email'   => $request->university_email,
            'email'              => $request->email,
            'phone'              => $request->phone,
            'password'           => Hash::make($request->password),
        ]);
        $user->assignRole('Student');
        return response()->json([
            'message' => 'Пользователь успешно зарегистрирован',
            'user' => $user 
        ]);
    }
    public function postLogin(string $university_email, string $password){
        $user = User::where('university_email', $university_email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'status' => 'auth_error',
                'message' => 'Неверное имя пользователя или пароль.',
            ], 401);
        }
        $token = $user->createToken('Token');
        $token->accessToken->expires_at = now()->addDays(7);
        $token->accessToken->save();
        return response()->json([ 
            'message' => 'Вход выполнен успешно',
            'token' => $token->plainTextToken,
            'user' => [
                'id' => $user->id,
                'full_name' => $user->full_name,
                'username' => $user->university_email,
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
    public function getRoles(){
        $roles = Role::all();
        return response()->json([ 
            "Roles"=> [
                $roles->pluck("name","id")
            ]
        ]);
    }
    public function getStudents(){
        $data = User::role('Student')->get();
        return response()->json([
            "Students" => $data->map(function ($item) {
                return [
                    'id'                 => $item->id,
                    'full_name'          => $item->full_name,
                    'university_email'   => $item->university_email,
                    'email'              => $item->email,
                    'phone'              => $item->phone,
                ];
            })->values()
        ]);
    }
    public function getTeachers(){
        $data = User::role("Teacher")->get();
        return response()->json([
            "Teachers" => $data->map(function ($item) {
                return [
                    'id'                 => $item->id,
                    'full_name'          => $item->full_name,
                    'university_email'   => $item->university_email,
                    'email'              => $item->email,
                    'phone'              => $item->phone,
                ];
            })->values()
        ]);
    }
    public function getWebAdmins(){
        $data = User::role("Website Admin")->get();
        return response()->json([
            "Website Admins" => $data->map(function ($item) {
                return [
                    'id'                 => $item->id,
                    'full_name'          => $item->full_name,
                    'university_email'   => $item->university_email,
                    'email'              => $item->email,
                    'phone'              => $item->phone,
                ];
            })->values()
        ]);
    }
    public function getPermissions(){
        $data = Permission::all();
        return response()->json([ 
            "Permission"=> [
                $data->pluck('name', 'id'),
            ]
        ]);
    }
    public function getCurrentUserInformation($user){
        return response()->json([
                    'id'                 => $user->id,
                    'full_name'          => $user->full_name,
                    'university_email'   => $user->university_email,
                    'email'              => $user->email,
                    'phone'              => $user->phone,
            ]
        );
    }
    public function getPermissionsByRole(){
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        $rolesWithPermissions = $roles->mapWithKeys(function ($role) {
            return [
                $role->name => $role->permissions->pluck('name', 'id')
            ];
        });

        return response()->json([
            'Roles' => $rolesWithPermissions,
            'Permissions' => $permissions->pluck('name', 'id')
    ]);
    }
    public function putPermissionToRole($request){
        $role = Role::findById($request->input('role_id'));
        $permissionIds = $request->input('permissions');
        foreach($permissionIds as $id){
            if ($role->hasPermissionTo($id)){
                $role->revokePermissionTo($id);
            }else{
                $role->givePermissionTo($id);
            }
        }
        return $this->getPermissionsByRole();
    } 
    public function putAnotherRoleToUser($request){
        $role = Role::findById($request->input('role_id'));
        $user = User::find($request->input('user_id'));
        $user->syncRoles([$role]);
        return response()->json([
            "User" => $user,
            "New-role" => $user->roles->pluck("name","id"),
        ]);
    }
    public function postCreateCourse($request){
        $data = Courses::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'credits'       => $request->credits,
            'status'        => $request->status ?? 'active',
        ]);
        return response()->json([
            'message' => 'Курс успешно создан',
            'Курс' => $data 
        ]);
    }
    public function postCreateUser($request){
        $user = User::create([
            'full_name'          => $request->full_name,
            'university_email'   => $request->university_email,
            'email'              => $request->email,
            'phone'              => $request->phone,
            'password'           => Hash::make($request->password),
        ]);
        $user->assignRole($request->input('role_id'));
        return response()->json([
            'message' => 'User успешно создан',
            "New-user" => $user,
            "New-user's-role" => $user->roles->pluck("name","id"),
        ]);
    }
    public function getEnrolledCourse($user){
        return response()->json([
            'User' => $user->full_name,
            'Courses' => $user->courses
        ]);
    }
    public function postEnrollToCourse($request, $user){
        $course = Courses::find($request->input('course_id'));
        if($user->courses()->where('course_id', $request->input('course_id'))->exists()) {
            return response()->json([
                'message' => 'Вы уже зарегистрированы на этот курс',
                'Данный курс' => $course,
                'User' => $user->full_name,
                'Все курсы' => $user->courses
            ]);
        }
        $user->courses()->attach($request->input('course_id'));
        return response()->json([
            'message' => 'Регистрация прошла успешно' ,
            'User' => $user->full_name,
            'Course' => $course,
            'Все курсы' => $user->courses
        ],200);
    }
    public function postUnenrollToCourse($request, $user){
        if (!$user->isEnrolledIn($request->input('course_id'))) {
            return response()->json([
                'message' => 'Вы не зарегистрированы на этот курс.',
                'User' => $user->full_name,
                'Все курсы' => $user->courses
            ]);
        }
        $user->courses()->detach($request->input('course_id'));
        return response()->json([
            'message' => 'Вы успешно отказались от курса.',
            'User' => $user->full_name,
            'Все курсы' => $user->courses
        ]);
    }
}