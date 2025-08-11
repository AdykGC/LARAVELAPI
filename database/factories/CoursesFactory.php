<?php

namespace Database\Factories;

use App\Models\Courses;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursesFactory extends Factory {
    protected $model = Courses::class;
    public function definition() {
        return [
            'title' => $this->faker->word(), // случайное название курса
            'description' => $this->faker->sentence(), // случайное описание
            'credits' => $this->faker->numberBetween(1, 6,), // случайное количество кредитов
            'status' => $this->faker->randomElement(['active', 'inactive']), // случайный статус
        ];
    }
}
