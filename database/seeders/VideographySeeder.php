<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\VideographyPlan;
use App\Models\Admin\VideographyFeature;
use App\Models\Admin\VideographyCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $video_categories = [
            [
                'title' => 'Layanan Pembuatan Video Syuting',
                'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A dolorem reprehenderit hic accusantium harum, fugiat eum atque ea provident in consequuntur deleniti aperiam, sunt earum',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Layanan Pembuatan Video Dokumentasi',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptate cum iste, nobis est consequatur enim ad aliquid magni rerum animi facilis beatae culpa placeat. Voluptas, eum quo!',
                'image' => fake()->filePath()
            ],
        ];

        collect($video_categories)->each(function ($category) {
            VideographyCategory::create($category);
        });

        $video_plans = [
            [
                'videography_category_id' => 1,
                'title' => 'Ekonomis',
                'price' => 250000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'videography_category_id' => 1,
                'title' => 'Terlaris',
                'price' => 500000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'videography_category_id' => 2,
                'title' => 'Ekonomis',
                'price' => 250000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'videography_category_id' => 2,
                'title' => 'Terlaris',
                'price' => 500000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
        ];

        collect($video_plans)->each(function ($plan) {
            VideographyPlan::create($plan);
        });

        $video_feature = [
            [
                'text' => 'Camera Cinema Mirorless',
                'videography_plan_id' => 1
            ],
            [
                'text' => 'Lensa Cinema',
                'videography_plan_id' => 1
            ],
            [
                'text' => 'Lighting Standar',
                'videography_plan_id' => 1
            ],
            [
                'text' => 'Clip On',
                'videography_plan_id' => 1
            ],
            [
                'text' => 'Editing',
                'videography_plan_id' => 1
            ],
            [
                'text' => 'Kualitas Video HD',
                'videography_plan_id' => 1
            ],
            [
                'text' => 'Camera 4K Cinema',
                'videography_plan_id' => 2
            ],
            [
                'text' => 'Lensa Cinema',
                'videography_plan_id' => 2
            ],
            [
                'text' => 'Lighting Fullset',
                'videography_plan_id' => 2
            ],
            [
                'text' => 'Clip On',
                'videography_plan_id' => 2
            ],
            [
                'text' => 'Editing',
                'videography_plan_id' => 2
            ],
            [
                'text' => 'Kualitas Video 4K',
                'videography_plan_id' => 2
            ],
            [
                'text' => 'Camera Cinema Mirorless',
                'videography_plan_id' => 3
            ],
            [
                'text' => 'Lensa Cinema',
                'videography_plan_id' => 3
            ],
            [
                'text' => 'Lighting Standar',
                'videography_plan_id' => 3
            ],
            [
                'text' => 'Clip On',
                'videography_plan_id' => 3
            ],
            [
                'text' => 'Editing',
                'videography_plan_id' => 3
            ],
            [
                'text' => 'Kualitas Video HD',
                'videography_plan_id' => 3
            ],
            [
                'text' => 'Camera 4K Cinema',
                'videography_plan_id' => 4
            ],
            [
                'text' => 'Lensa Cinema',
                'videography_plan_id' => 4
            ],
            [
                'text' => 'Lighting Fullset',
                'videography_plan_id' => 4
            ],
            [
                'text' => 'Clip On',
                'videography_plan_id' => 4
            ],
            [
                'text' => 'Editing',
                'videography_plan_id' => 4
            ],
            [
                'text' => 'Kualitas Video 4K',
                'videography_plan_id' => 4
            ],
        ];

        collect($video_feature)->each(function ($feature) {
            VideographyFeature::create($feature);
        });
    }
}