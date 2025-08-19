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
    public function users(){
        return $this->belongsToMany(User::class, 'courses_to_users', 'course_id', 'user_id');
    }
}
