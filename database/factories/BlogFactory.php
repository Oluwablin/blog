<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(3),
            'user_id' => $user->id,
        ];
    }
}
