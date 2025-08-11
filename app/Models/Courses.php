<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'credits',
        'status'
    ];

    public function students(){
        return $this->belongsToMany(Student::class, 'courses_to_students', 'course_id', 'student_id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'courses_to_teachers', 'course_id', 'teacher_id');
    }
}
