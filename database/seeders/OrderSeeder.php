<?php

namespace Database\Seeders;

use App\Models\Admin\Design;
use App\Models\Admin\Photography;
use App\Models\Admin\Printing;
use App\Models\Admin\Videography;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $categories = ['Design', 'Photography', 'Videography', 'Printing'];
            $morphType = $categories[array_rand($categories)];

            $relatedModel = $this->createRelatedModel($morphType);

            $relatedModel->order()->create([
                'user_id' => 2,
                'name_customer' => fake()->name(),
                'number_customer' => fake('id_ID')->phoneNumber(),
                'email_customer' => fake()->safeEmail(),
                'description' => fake()->sentence(),
            ]);
        }
    }

    // Fungsi untuk membuat record di model yang sesuai dengan morphType
    private function createRelatedModel($morphType)
    {
        switch ($morphType) {
            case 'Design':
                return Design::create([
                    'design_plan_id' => rand(1, 5),
                    'slogan' => fake()->word(),
                    'color' => fake()->hexColor(),
                ]);
            case 'Photography':
                return Photography::create([
                    'photography_plan_id' => rand(1, 6),
                ]);
            case 'Videography':
                return Videography::create([
                    'videography_plan_id' => rand(1, 4),
                ]);
            case 'Printing':
                return Printing::create([
                    'material' => fake()->sentence(),
                    'scale' => '12x15x18',
                    'file_name' => fake()->fileExtension(),
                    'file_content' => fake()->filePath(),
                ]);
            default:
                break;
        }
    }
}
