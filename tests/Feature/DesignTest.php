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

class DesignTest extends TestCase
{
    protected $design;

    public function setUp(): void
    {
        parent::setUp();

        $this->design = Design::first();
    }

    /** @test */
    public function a_design_belongs_to_a_category()
    {
        // Assert that the design belongs to a category
        $this->assertNotNull($this->design->category);
        $this->assertInstanceOf(DesignCategory::class, $this->design->category);
    }

    /** @test */
    public function a_design_category_has_many_designs()
    {
        // Assert that the category has many designs
        $this->assertNotNull($this->design->category->designs);
        $this->assertInstanceOf(Collection::class, $this->design->category->designs);
        $this->assertInstanceOf(Design::class, $this->design->category->designs->first());
    }

    /** @test */
    public function a_design_category_has_many_plans()
    {
        // Assert that the category has many plans
        $this->assertNotNull($this->design->category->plans);
        $this->assertInstanceOf(Collection::class, $this->design->category->plans);
        $this->assertInstanceOf(DesignPlan::class, $this->design->category->plans->first());
    }

    /** @test */
    public function a_design_plan_has_many_features()
    {
        // Assert that the plan has many features
        $features = $this->design->category->plans->flatMap(function ($plan) {
            return $plan->features;
        });

        $this->assertNotNull($features);
        $this->assertInstanceOf(Collection::class, $features);
        $this->assertInstanceOf(DesignFeature::class, $features->first());
    }

    /** @test */
    public function a_design_feature_has_many_plans()
    {
        // Retrieve all features for the design's category plans
        $features = $this->design->category->plans->flatMap(function ($plan) {
            return $plan->features;
        });

        // Assert that the design feature has many plans
        $this->assertNotNull($features->first()->plan);
        $this->assertInstanceOf(DesignPlan::class, $features->first()->plan);
        $this->assertInstanceOf(Collection::class, $features->first()->plan->features);
        $this->assertInstanceOf(DesignFeature::class, $features->first()->plan->features->first());
    }

    /** @test */
    public function a_design_has_many_images()
    {
        // assert that the design has at least one image
        $this->assertNotNull($this->design->images);
        $this->assertInstanceOf(Collection::class, $this->design->images);
        $this->assertInstanceOf(DesignImage::class, $this->design->images->first());
    }

    /** @test */
    public function a_design_image_belongs_to_a_design()
    {
        // Retrieve an image from the database
        $image = $this->design->images->first();

        // Assert that the image belongs to a design
        $this->assertNotNull($image->design);
        $this->assertInstanceOf(Design::class, $image->design);
    }

}