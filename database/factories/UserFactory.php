<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory {
    public function definition(): array {
        return [
            'full_name' => fake()->name(),
            'university_email' => fake()->unique()->safeEmail(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'password' => bcrypt('Qaz123edc'),
        ];
    }
    public function unverified(): static {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
