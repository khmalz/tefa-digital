<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Admin\Design;
use App\Models\Admin\Contact;
use App\Models\Admin\Printing;
use App\Models\Admin\Portfolio;
use Illuminate\Database\Seeder;
use App\Models\Admin\DesignImage;
use App\Models\Admin\Photography;
use App\Models\Admin\Videography;

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

        Photography::factory(15)->create();
        Videography::factory(15)->create();
        Printing::factory(15)->create();

        $designs = Design::factory(16)->create();

        $designs->each(function ($design) {
            DesignImage::factory()->create(['design_id' => $design->id]);
        });

        DesignImage::factory(8)->create();

        Portfolio::factory(35)->create();
        Contact::create([
            'location' => 'Jl Pasar Mangkang Bl B/4',
            'email' => 'admin@gmail.com',
            'phone_number' => '+628679732129'
        ]);
    }
}
