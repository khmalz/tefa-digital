<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin\Design;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DesignImageTest extends TestCase
{
    /**
     * Summary of test_design_has_at_least_one_image
     * @return void
     */
    public function test_design_has_at_least_one_image(): void
    {
        $designs = Design::all();

        foreach ($designs as $design) {
            $this->assertTrue($design->images()->exists());
        }
    }
}