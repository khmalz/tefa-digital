<?php

namespace Database\Seeders;

use App\Models\Admin\Design;
use Illuminate\Database\Seeder;
use App\Models\Admin\DesignPlan;
use App\Models\Admin\DesignImage;
use App\Models\Admin\DesignFeature;
use App\Models\Admin\DesignCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $des_categories = [
            [
                'title' => 'Logo',
                'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. A dolorem reprehenderit hic accusantium harum, fugiat eum atque ea provident in consequuntur deleniti aperiam, sunt earum',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Promosi Digital',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore voluptate cum iste, nobis est consequatur enim ad aliquid magni rerum animi facilis beatae culpa placeat. Voluptas, eum quo!',
                'image' => fake()->filePath()
            ],
            [
                'title' => '3D',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. A, suscipit veritatis harum fugit, aut quo, esse pariatur enim facere necessitatibus obcaecati at. Eligendi dolorum nisi commodi quam aut laboriosam ab, odit accusantium adipisci nam!',
                'image' => fake()->filePath()
            ],
        ];

        collect($des_categories)->each(function ($category) {
            DesignCategory::create($category);
        });

        $des_plans = [
            [
                'design_category_id' => 1,
                'title' => 'ekonomis',
                'price' => 200000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 1,
                'title' => 'populer',
                'price' => 250000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 1,
                'title' => 'lengkap',
                'price' => 300000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 2,
                'title' => 'ekonomis',
                'price' => 100000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 2,
                'title' => 'populer',
                'price' => 270000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 2,
                'title' => 'lengkap',
                'price' => 450000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 3,
                'title' => 'ekonomis',
                'price' => 100000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 3,
                'title' => 'populer',
                'price' => 270000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
            [
                'design_category_id' => 3,
                'title' => 'lengkap',
                'price' => 450000,
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam consectetur eius ex, cum placeat totam natus necessitatibus minus veritatis iure fuga nam illum aperiam tempore enim dolore! Error, dolor.'
            ],
        ];

        collect($des_plans)->each(function ($plan) {
            DesignPlan::create($plan);
        });

        $des_feature = [
            [
                'text' => 'Mendapat 1 alternatif design',
                'design_plan_id' => 1
            ],
            [
                'text' => '3-4 hari',
                'design_plan_id' => 1
            ],
            [
                'text' => 'Revisi 1x',
                'design_plan_id' => 1
            ],
            [
                'text' => 'Color Guidelines',
                'design_plan_id' => 1
            ],
            [
                'text' => 'File Master CDR/AI/EPS',
                'design_plan_id' => 1
            ],
            [
                'text' => 'Export JPG / PNG / PDF',
                'design_plan_id' => 1
            ],
            [
                'text' => 'Mendapat 2 alternatif design',
                'design_plan_id' => 2
            ],
            [
                'text' => '4-5 hari',
                'design_plan_id' => 2
            ],
            [
                'text' => 'Revisi 3x',
                'design_plan_id' => 2
            ],
            [
                'text' => 'Color Guidelines',
                'design_plan_id' => 2
            ],
            [
                'text' => 'File Master CDR/AI/EPS',
                'design_plan_id' => 2
            ],
            [
                'text' => 'Export JPG / PNG / PDF',
                'design_plan_id' => 2
            ],
            [
                'text' => 'Filosofi Logo',
                'design_plan_id' => 2
            ],
            [
                'text' => 'Mendapat 3 alternatif design',
                'design_plan_id' => 3
            ],
            [
                'text' => '6-7 hari',
                'design_plan_id' => 3
            ],
            [
                'text' => 'Revisi 3x',
                'design_plan_id' => 3
            ],
            [
                'text' => 'Color Guidelines',
                'design_plan_id' => 3
            ],
            [
                'text' => 'File Master CDR/AI/EPS',
                'design_plan_id' => 3
            ],
            [
                'text' => 'Export JPG / PNG / PDF',
                'design_plan_id' => 3
            ],
            [
                'text' => 'Filosofi Logo',
                'design_plan_id' => 3
            ],
            [
                'text' => 'feature 1.4',
                'design_plan_id' => 4
            ],
            [
                'text' => 'feature 2.4',
                'design_plan_id' => 4
            ],
            [
                'text' => 'feature 1.5',
                'design_plan_id' => 5
            ],
            [
                'text' => 'feature 2.5',
                'design_plan_id' => 5
            ],
            [
                'text' => 'feature 1.6',
                'design_plan_id' => 6
            ],
            [
                'text' => 'feature 2.6',
                'design_plan_id' => 6
            ],
            [
                'text' => 'feature 1.7',
                'design_plan_id' => 7
            ],
            [
                'text' => 'feature 2.7',
                'design_plan_id' => 7
            ],
            [
                'text' => 'feature 1.8',
                'design_plan_id' => 8
            ],
            [
                'text' => 'feature 2.8',
                'design_plan_id' => 8
            ],
            [
                'text' => 'feature 1.9',
                'design_plan_id' => 9
            ],
            [
                'text' => 'feature 2.9',
                'design_plan_id' => 9
            ],
        ];

        collect($des_feature)->each(function ($feature) {
            DesignFeature::create($feature);
        });
    }
}