<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Design;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\DesignImage>
 */
class DesignImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'design_id' => Design::inRandomOrder()->value('id'),
        ];
    }
}
