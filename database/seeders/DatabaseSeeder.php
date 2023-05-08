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

        Design::factory(5)->create();
        Photography::factory(5)->create();
        Videography::factory(5)->create();
        Printing::factory(5)->create();

        DesignImage::factory(10)->create();
    }
}