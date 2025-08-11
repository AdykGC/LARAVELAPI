<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder {
    public function run(){
        // Создаём 5 преподавателей
        Teacher::factory(5)->create();
    }
}
