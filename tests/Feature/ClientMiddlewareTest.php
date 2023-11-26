<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientMiddlewareTest extends TestCase
{
    use RefreshDatabase;
    protected $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->initDatabase();

        $this->client = User::where('email', 'client@gmail.com')->first();
    }

    public function testClientCanAccessProfilePage()
    {
        $this->actingAs($this->client);

        // Akses halaman profil
        $response = $this->get(route('user.profile.index'));

        // Pastikan respons status OK (200)
        $response->assertStatus(200);
    }

    public function testClientCanAccessDesignFormPage()
    {
        $this->actingAs($this->client);

        $response = $this->get(route('user.design.form.index'));

        // Pastikan respons status OK (200)
        $response->assertStatus(200);
    }

    public function testClientCanAccessPhotographyFormPage()
    {
        $this->actingAs($this->client);

        $response = $this->get(route('user.photography.form.index'));

        // Pastikan respons status OK (200)
        $response->assertStatus(200);
    }

    public function testClientCanAccessVideographyFormPage()
    {
        $this->actingAs($this->client);

        $response = $this->get(route('user.videography.form.index'));

        // Pastikan respons status OK (200)
        $response->assertStatus(200);
    }

    public function testClientCanAccessPrintingFormPage()
    {
        $this->actingAs($this->client);

        $response = $this->get(route('user.printing.form.index'));

        // Pastikan respons status OK (200)
        $response->assertStatus(200);
    }

    public function testClientCannotAccessAdminDashboard()
    {
        $this->assertNotNull($this->client);
        $this->actingAs($this->client);

        // Akses halaman admin
        $adminResponse = $this->get(route('dashboard'));

        // Pastikan respons status 403 (Forbidden)
        $adminResponse->assertStatus(403);
    }
}
