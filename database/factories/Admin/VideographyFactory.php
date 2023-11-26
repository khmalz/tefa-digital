<?php

namespace Database\Factories\Admin;

use App\Models\Admin\VideographyPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Videography>
 */
class VideographyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'videography_plan_id' => VideographyPlan::inRandomOrder()->value('id'),
            'name_customer' => fake('id_ID')->name(),
            'number_customer' => fake('id_ID')->phoneNumber(),
            'email_customer' => fake('id_ID')->safeEmail(),
            'description' => fake()->sentence(),
        ];
    }
}
