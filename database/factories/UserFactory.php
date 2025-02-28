<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'email' => fake()->unique()->safeEmail(),
            'emailBis' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber,
            'phoneBis' => fake()->phoneNumber,
            'is_admin' => 0,
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ];
    }
}
