<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder {
    public function run() {
        // Создаём 20 студентов
        Student::factory(20)->create();
    }
}
