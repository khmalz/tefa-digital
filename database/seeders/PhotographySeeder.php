<?php

namespace Database\Seeders;

use App\Models\Admin\PhotographyCategory;
use App\Models\Admin\PhotographyFeature;
use App\Models\Admin\PhotographyPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photo_categories = [
            [
                'title' => 'Produk',
                'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A dolorem reprehenderit hic accusantium harum, fugiat eum atque ea provident in consequuntur deleniti aperiam, sunt earum',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Pernikahan',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptate cum iste, nobis est consequatur enim ad aliquid magni rerum animi facilis beatae culpa placeat. Voluptas, eum quo!',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Acara',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A, suscipit veritatis harum fugit, aut quo, esse pariatur enim facere necessitatibus obcaecati at. Eligendi dolorum nisi commodi quam aut laboriosam ab, odit accusantium adipisci nam!',
                'image' => fake()->filePath()
            ],
        ];

        collect($photo_categories)->each(function ($category) {
            PhotographyCategory::create($category);
        });

        $photo_plans = [
            [
                'photography_category_id' => 1,
                'title' => 'Basic',
                'price' => 25000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'photography_category_id' => 1,
                'title' => 'Plus',
                'price' => 50000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'photography_category_id' => 2,
                'title' => 'Basic',
                'price' => 25000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'photography_category_id' => 2,
                'title' => 'Plus',
                'price' => 50000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'photography_category_id' => 3,
                'title' => 'Basic',
                'price' => 25000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'photography_category_id' => 3,
                'title' => 'Plus',
                'price' => 50000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
        ];

        collect($photo_plans)->each(function ($plan) {
            PhotographyPlan::create($plan);
        });

        $photo_feature = [
            [
                'text' => 'Camera DSLR Canon 600D',
                'photography_plan_id' => 1
            ],
            [
                'text' => 'Lensa Standar',
                'photography_plan_id' => 1
            ],
            [
                'text' => 'Lighting Standar',
                'photography_plan_id' => 1
            ],
            [
                'text' => 'Kualitas Foto HD',
                'photography_plan_id' => 1
            ],
            [
                'text' => 'Camera Canon EOS 4000D',
                'photography_plan_id' => 2
            ],
            [
                'text' => 'Lighting Fullset',
                'photography_plan_id' => 2
            ],
            [
                'text' => 'Kualitas Foto Full HD',
                'photography_plan_id' => 2
            ],
            [
                'text' => 'Camera DSLR Canon 600D',
                'photography_plan_id' => 3
            ],
            [
                'text' => 'Lensa Standar',
                'photography_plan_id' => 3
            ],
            [
                'text' => 'Lighting Standar',
                'photography_plan_id' => 3
            ],
            [
                'text' => 'Kualitas Foto HD',
                'photography_plan_id' => 3
            ],
            [
                'text' => 'Camera Canon EOS 4000D',
                'photography_plan_id' => 4
            ],
            [
                'text' => 'Lighting Fullset',
                'photography_plan_id' => 4
            ],
            [
                'text' => 'Kualitas Foto Full HD',
                'photography_plan_id' => 4
            ],
            [
                'text' => 'Camera DSLR Canon 600D',
                'photography_plan_id' => 5
            ],
            [
                'text' => 'Lensa Standar',
                'photography_plan_id' => 5
            ],
            [
                'text' => 'Lighting Standar',
                'photography_plan_id' => 5
            ],
            [
                'text' => 'Kualitas Foto HD',
                'photography_plan_id' => 5
            ],
            [
                'text' => 'Camera Canon EOS 4000D',
                'photography_plan_id' => 6
            ],
            [
                'text' => 'Lighting Fullset',
                'photography_plan_id' => 6
            ],
            [
                'text' => 'Kualitas Foto Full HD',
                'photography_plan_id' => 6
            ],
        ];

        collect($photo_feature)->each(function ($feature) {
            PhotographyFeature::create($feature);
        });
    }
}