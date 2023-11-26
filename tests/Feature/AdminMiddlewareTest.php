<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;
    protected $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->initDatabase();

        $this->admin = User::where('email', 'admin@gmail.com')->first();
    }

    public function testAdminCanAccessAdminDashboard()
    {
        $this->actingAs($this->admin);

        // Akses halaman admin
        $response = $this->get(route('dashboard'));

        // Pastikan respons status OK (200)
        $response->assertStatus(200);
    }

    public function testAdminCannotAccessUserProfilePage()
    {
        $this->actingAs($this->admin);

        // Akses halaman profil pengguna
        $response = $this->get(route('user.profile.index'));

        // Pastikan respons status 403 (Forbidden)
        $response->assertStatus(403);
    }

    public function testAdminCannotAccessDesignFormPage()
    {
        $this->actingAs($this->admin);

        // Akses halaman formulir desain pengguna
        $response = $this->get(route('user.design.form.index'));

        // Pastikan respons status 403 (Forbidden)
        $response->assertStatus(403);
    }

    public function testAdminCannotAccessPrintingFormPage()
    {
        $this->actingAs($this->admin);

        // Akses halaman formulir cetak pengguna
        $response = $this->get(route('user.printing.form.index'));

        // Pastikan respons status 403 (Forbidden)
        $response->assertStatus(403);
    }
}
