<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'role',
        'full_name',
        'university_email',
        'email',
        'phone',
        'password',
        'last_login_at',
        'last_login_ip',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function courses(){
        return $this->belongsToMany(Courses::class, 'courses_to_users', 'user_id', 'course_id');
    }
    public function isEnrolledIn($course_id): bool {
        return $this->courses()->where('course_id', $course_id)->exists(); 
    }
}