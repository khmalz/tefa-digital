<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\DesignImage;
use App\Models\User;
use App\Models\Admin\Design;
use App\Models\Admin\Photography;
use App\Models\Admin\Printing;
use App\Models\Admin\Videography;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $this->call([
            DesignSeeder::class,
            PhotographySeeder::class,
            VideographySeeder::class
        ]);

        Photography::factory(5)->create();
        Videography::factory(5)->create();
        Printing::factory(5)->create();

        $designs = Design::factory(5)->create();

        $designs->each(function ($design) {
            DesignImage::factory()->create(['design_id' => $design->id]);
        });

        DesignImage::factory(7)->create();
    }
}