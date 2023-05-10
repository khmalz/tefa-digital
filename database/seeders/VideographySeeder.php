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
                'title' => 'Video Syuting',
                'body' => 'Ciptakan video yang memukau dengan jasa pembuatan video syuting kami. Tim kami akan mengambil video syuting secara profesional dan menghasilkan video yang sesuai keinginan Anda. Hubungi kami sekarang untuk penawaran terbaik.',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Video Dokumentasi',
                'body' => 'Buat momen penting dan spesial Anda terabadikan dengan jasa pembuatan video dokumentasi kami. Kami menawarkan jasa pembuatan video dokumentasi untuk acara, proyek, atau keperluan bisnis Anda. Kami akan bekerja sama dengan Anda untuk memahami kebutuhan Anda dan menghasilkan video yang sesuai dengan visi Anda. Dapatkan video dokumentasi yang berkualitas tinggi untuk memenuhi kebutuhan Anda. Hubungi kami sekarang untuk mendapatkan penawaran terbaik untuk jasa pembuatan video dokumentasi kami.',
                'image' => fake()->filePath()
            ],
        ];

        collect($video_categories)->each(function ($category) {
            VideographyCategory::create($category);
        });

        $video_plans = [
            [
                'videography_category_id' => 1,
                'title' => 'Basic',
                'price' => 250000,
            ],
            [
                'videography_category_id' => 1,
                'title' => 'Plus',
                'price' => 500000,
            ],
            [
                'videography_category_id' => 2,
                'title' => 'Basic',
                'price' => 250000,
            ],
            [
                'videography_category_id' => 2,
                'title' => 'Plus',
                'price' => 500000,
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
