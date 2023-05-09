<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin\Design;
use App\Models\Admin\DesignPlan;
use App\Models\Admin\DesignImage;
use Illuminate\Support\Collection;
use App\Models\Admin\DesignFeature;
use App\Models\Admin\DesignCategory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DesignTest extends TestCase
{
    // use RefreshDatabase;

    // public function setUp(): void
    // {
    //     parent::setUp();

    //     $this->artisan('migrate:fresh --seed');
    // }

    /** @test */
    public function a_design_has_categories()
    {
        // retrieve a design from the database
        $design = Design::first();

        // assert that the design has at least one category
        $this->assertNotNull($design->category);
        $this->assertInstanceOf(DesignCategory::class, $design->category);
    }

    /** @test */
    public function a_design_has_images()
    {
        // retrieve a design from the database
        $design = Design::first();

        // assert that the design has at least one image
        $this->assertNotNull($design->images);
        $this->assertInstanceOf(Collection::class, $design->images);
        $this->assertInstanceOf(DesignImage::class, $design->images->first());
    }

    /** @test */
    public function a_design_has_plans()
    {
        // retrieve a design from the database
        $design = Design::first();

        // assert that the design has at least one plan
        $this->assertNotNull($design->category->plans);
        $this->assertInstanceOf(Collection::class, $design->category->plans);
        $this->assertInstanceOf(DesignPlan::class, $design->category->plans->first());
    }

    /** @test */
    public function a_design_has_at_least_one_feature()
    {
        // retrieve a design from the database
        $design = Design::first();

        // get all the features of all the design plans
        $features = $design->category->plans->flatMap(function ($plan) {
            return $plan->features;
        });

        // assert that the design has at least one feature
        $this->assertNotNull($features);
        $this->assertInstanceOf(Collection::class, $features);
        $this->assertInstanceOf(DesignFeature::class, $features->first());
    }

}