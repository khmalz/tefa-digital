<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Title;
use App\Models\Admin\Order;
use App\Models\Admin\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);
        $admin->assignRole('admin');

        $client = User::factory()->create([
            'name' => 'Client',
            'email' => 'client@gmail.com',
        ]);
        $client->assignRole('client');

        $this->call([
            DesignSeeder::class,
            PhotographySeeder::class,
            VideographySeeder::class,
            PortfolioSeeder::class,
            OrderSeeder::class
        ]);

        Contact::create([
            'location' => 'Jl. B7 Cipinang Pulo No.19',
            'email' => 'tefadigital.smk46@gmail.com',
            'phone_number' => '+628679732129'
        ]);

        Title::create([
            'name' => 'Tefa Digital',
        ]);
    }
}
