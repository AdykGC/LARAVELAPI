<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Model{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        // Личные данные преподавателя
        'full_name',
        'phone',
        'email',
        'birth_date',
        'address',
        'gender',
        'avatar',
        // Внешние ключи
        'faculty_id',
        'major_id',
        // Логин преподавателя
        'teac_email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function courses(){
        return $this->belongsToMany(Courses::class, 'courses_to_teachers', 'teacher_id', 'course_id');
    }
    public function isEnrolledIn($course_id): bool {
        return $this->courses()->where('course_id', $course_id)->exists(); 
    }
}
