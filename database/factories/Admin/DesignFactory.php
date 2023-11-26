<?php

namespace Database\Factories\Admin;

use App\Models\Admin\DesignPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Design>
 */
class DesignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'design_plan_id' => DesignPlan::inRandomOrder()->value('id'),
            'name_customer' => fake('id_ID')->name(),
            'number_customer' => fake('id_ID')->phoneNumber(),
            'email_customer' => fake('id_ID')->safeEmail(),
            'slogan' => fake('id_ID')->words(2, true),
            'color' => fake()->colorName(),
            'description' => fake()->sentence(),
        ];
    }
}
