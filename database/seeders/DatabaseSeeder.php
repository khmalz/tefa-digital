<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Admin\Design;
use App\Models\Admin\Contact;
use App\Models\Admin\Printing;
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
            VideographySeeder::class,
            PortfolioSeeder::class
        ]);

        Contact::create([
            'location' => 'Jl. B7 Cipinang Pulo No.19',
            'email' => 'tefadigital.smk46@gmail.com',
            'phone_number' => '+628679732129'
        ]);
    }
}
