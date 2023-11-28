<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Printing>
 */
class PrintingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_customer' => fake('id_ID')->name(),
            'number_customer' => fake('id_ID')->phoneNumber(),
            'email_customer' => fake('id_ID')->safeEmail(),
            'material' => fake('id_ID')->word(),
            'scale' => $this->randomDimensions(),
            'file' => fake()->filePath(),
            'description' => fake()->sentence(),
        ];
    }

    /**
     * Metode kustom untuk menghasilkan data acak dengan format "30x40x60".
     */
    public function randomDimensions(): string
    {
        return sprintf('%dx%dx%d', fake()->numberBetween(10, 100), fake()->numberBetween(10, 100), fake()->numberBetween(10, 100));
    }
}
