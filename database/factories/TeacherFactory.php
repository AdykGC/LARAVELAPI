<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory {
    protected $model = Teacher::class;
    public function definition() {
        return [
            'full_name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'birth_date' => $this->faker->date(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'avatar' => $this->faker->imageUrl(),
            'teac_email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password123'),  // Простой пароль
        ];
    }
}
