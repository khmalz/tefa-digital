<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['design', 'photography', 'videography', 'printing'];

        return [
            'category' => fake()->randomElement($categories),
            'title' => fake()->words(2, true),
            'path' => fake()->filePath(),
        ];
    }
}
