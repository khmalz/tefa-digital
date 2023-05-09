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
                'body' => 'Buat produk Anda terlihat lebih menarik dengan jasa foto produk kami. Tim ahli kami akan mengambil gambar produk Anda dengan menggunakan peralatan fotografi terbaik dan mengedit foto untuk hasil yang lebih baik. Dapatkan foto produk yang memukau dengan penawaran terbaik dari kami. Hubungi kami sekarang!',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Pernikahan',
                'body' => 'Abadikan momen spesial pernikahan Anda dengan jasa foto pernikahan kami. Dapatkan kenangan pernikahan yang abadi dengan penawaran terbaik dari kami. Hubungi kami sekarang!',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Acara',
                'body' => 'Kami menawarkan jasa fotografi acara untuk mengabadikan momen penting Anda. Tim kami akan mengambil gambar acara Anda dengan baik dan menghasilkan gambar yang memukau. Dapatkan gambar acara Anda yang paling berkesan dengan jasa fotografi acara kami. Hubungi kami sekarang untuk mendapatkan penawaran terbaik.',
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
            ],
            [
                'photography_category_id' => 1,
                'title' => 'Plus',
                'price' => 50000,
            ],
            [
                'photography_category_id' => 2,
                'title' => 'Basic',
                'price' => 25000,
            ],
            [
                'photography_category_id' => 2,
                'title' => 'Plus',
                'price' => 50000,
            ],
            [
                'photography_category_id' => 3,
                'title' => 'Basic',
                'price' => 25000,
            ],
            [
                'photography_category_id' => 3,
                'title' => 'Plus',
                'price' => 50000,
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