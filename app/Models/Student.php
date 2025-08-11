<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model {
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        // Личные данные студента
        'full_name',
        'phone',
        'email',
        'birth_date',
        'address',
        'gender',
        'avatar',
        // Учебная информация
        'status',
        'gpa',
        'credits',
        // Внешние ключи
        'faculty_id',
        'major_id',
        // Логин студента
        'stud_email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function courses(){
        return $this->belongsToMany(Courses::class, 'courses_to_students', 'student_id', 'course_id');
    }
    public function isEnrolledIn($course_id): bool {
        return $this->courses()->where('course_id', $course_id)->exists(); 
    }
    public function totalEnrolledCredits(): int {
        return $this->courses()->sum('credits');
    }
    public function hasCreditCapacityFor($newCourse): bool {
        $max_credits = $this->max_credits ?? 21; // если null — подставит 21
        $current = $this->totalEnrolledCredits();
        return ($current + $newCourse->credits) <= $max_credits;
    }
}
