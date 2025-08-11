<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder {
    public function run() {
        // Создаём 20 случайных курсов с помощью фабрики
        Courses::factory(20)->create();
    }
}
