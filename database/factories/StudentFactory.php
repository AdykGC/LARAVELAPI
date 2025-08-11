<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory {
    protected $model = Student::class;
    public function definition() {
        return [
            'full_name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'birth_date' => $this->faker->date(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'avatar' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'gpa' => $this->faker->randomFloat(2, 0, 4),  // GPA от 0 до 4
            'credits' => $this->faker->numberBetween(0, 180),
            'stud_email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password123'),  // Простой пароль
        ];
    }
}
