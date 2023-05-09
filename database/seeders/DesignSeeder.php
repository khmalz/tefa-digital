<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\DesignPlan;
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
                'body' => 'Buat merek Anda terlihat profesional dan menonjol dengan jasa desain logo kami. Tim ahli kami akan menciptakan logo yang sesuai dengan keinginan Anda. Kami menawarkan revisi logo dan format file logo yang sesuai dengan kebutuhan Anda. Dapatkan logo merek yang kuat dengan penawaran terbaik dari kami. Hubungi kami sekarang!',
                'image' => fake()->filePath()
            ],
            [
                'title' => 'Promosi Digital',
                'body' => 'Yuk, promosikan bisnismu dengan desain promosi digital yang menarik dan profesional! Kami menawarkan jasa desain promosi digital dengan harga mulai dari Rp 100 ribu saja.',
                'image' => fake()->filePath()
            ],
            [
                'title' => '3D',
                'body' => 'Anda mencari jasa desain 3D yang terjangkau dan berkualitas? Kami menawarkan jasa desain 3D dengan harga mulai dari Rp 150 ribu saja.',
                'image' => fake()->filePath()
            ],
        ];

        collect($des_categories)->each(function ($category) {
            DesignCategory::create($category);
        });

        $des_plans = [
            [
                'design_category_id' => 1,
                'title' => 'Ekonomis',
                'price' => 200000,
            ],
            [
                'design_category_id' => 1,
                'title' => 'Populer',
                'price' => 250000,
            ],
            [
                'design_category_id' => 1,
                'title' => 'Lengkap',
                'price' => 300000,
            ],
            [
                'design_category_id' => 2,
                'title' => 'Basic',
                'price' => 100000,
            ],
            [
                'design_category_id' => 3,
                'title' => 'Basic',
                'price' => 150000,
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
                'text' => 'Design Unik',
                'description' => 'Kami menawarkan desain yang unik dan kreatif yang akan membantu bisnis para klien tampil berbeda dari pesaing. Kami memahami bahwa desain yang menarik dan berbeda adalah kunci untuk menarik perhatian pelanggan potensial dan meningkatkan penjualan.',
                'design_plan_id' => 4
            ],
            [
                'text' => 'Konsultasi Gratis',
                'description' => 'Kami juga menawarkan konsultasi gratis untuk membantu klien memilih desain yang paling sesuai dengan bisnis dan visi mereka untuk kampanye promosi. Kami akan membantu mengidentifikasi kebutuhan dan tujuan bisnis, serta menyampaikan ide dan saran untuk mendapatkan hasil yang terbaik.',
                'design_plan_id' => 4
            ],
            [
                'text' => 'Pengerjaan Profesional',
                'description' => 'Kami juga menawarkan pengerjaan profesional dengan kualitas terbaik. Tim kami mengutamakan sebuah kualitas dan kami akan memastikan desain yang akurat, rapi, dan sesuai dengan kebutuhan klien.',
                'design_plan_id' => 4
            ],
            [
                'text' => 'Konsultasi Gratis',
                'description' => 'Kami menawarkan konsultasi gratis untuk membantu Anda memahami bagaimana desain 3D dapat membantu meningkatkan proyek Anda. Tim kami siap memberikan saran dan ide kreatif tentang desain 3D yang dapat membuat proyek Anda terlihat lebih realistis dan memukau. Hubungi kami sekarang untuk menjadwalkan konsultasi gratis dengan tim kami!',
                'design_plan_id' => 5
            ],
            [
                'text' => 'Harga yang Sesuai',
                'description' => 'Kami memberikan penawaran harga yang sesuai dengan tingkat kerumitan dari detail pemesanan design dan tentunya berdasarkan hasil diskusi dengan klien. Juga, kami berkomitmen untuk memberikan hasil yang memuaskan bagi klien kami dengan harga yang sesuai dengan anggaran proyek.',
                'design_plan_id' => 5
            ],
        ];

        collect($des_feature)->each(function ($feature) {
            DesignFeature::create($feature);
        });
    }
}