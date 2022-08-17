<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakerFirstName = fake()->firstName();
        $fakerLastName = fake()->lastName();
        return [
            'firstname' => $fakerFirstName,
            'lastname' => $fakerLastName,
            'profile_image' => '', // will implement later
        ];
    }
}
