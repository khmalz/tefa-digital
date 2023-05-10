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
    public function test_design_belongs_to_a_plan()
    {
        // Assert that the design belongs to a plan
        $this->assertNotNull($this->design->plan);
        $this->assertInstanceOf(DesignPlan::class, $this->design->plan);
    }

    /** @test */
    public function test_design_plan_has_many_designs()
    {
        // Assert that the plan has many designs
        $this->assertNotNull($this->design->plan->designs);
        $this->assertInstanceOf(Collection::class, $this->design->plan->designs);
        $this->assertInstanceOf(Design::class, $this->design->plan->designs->first());
    }

    public function test_design_category_has_many_plans()
    {
        $category = $this->design->plan->category;

        $this->assertNotNull($category->plans);
        $this->assertInstanceOf(Collection::class, $category->plans);
        $this->assertInstanceOf(DesignPlan::class, $category->plans->first());
    }

    public function test_design_plan_belongs_to_one_design_category()
    {
        $category = $this->design->plan->category;

        $this->assertNotNull($category);
        $this->assertInstanceOf(DesignCategory::class, $category);
    }

    /** @test */
    public function test_design_plan_has_many_features()
    {
        // Assert that the plan has many features
        $this->assertNotNull($this->design->plan->features);
        $this->assertInstanceOf(Collection::class, $this->design->plan->features);
        $this->assertInstanceOf(DesignFeature::class, $this->design->plan->features->first());

        // Assert that each feature belongs to the plan
        foreach ($this->design->plan->features as $feature) {
            $this->assertEquals($this->design->plan->id, $feature->design_plan_id);
        }
    }


    /** @test */
    public function test_design_feature_belongs_to_a_design_plan()
    {
        // Assert that the feature belongs to a plan
        $this->assertNotNull($this->design->plan->features->first()->plan);
        $this->assertInstanceOf(DesignPlan::class, $this->design->plan->features->first()->plan);
    }

    /** @test */
    public function test_design_has_many_images()
    {
        // Assert that the design has many images
        $this->assertNotNull($this->design->images);
        $this->assertInstanceOf(Collection::class, $this->design->images);
        $this->assertInstanceOf(DesignImage::class, $this->design->images->first());

        // Assert that each image belongs to the design
        foreach ($this->design->images as $image) {
            $this->assertEquals($this->design->id, $image->design_id);
        }
    }

    /** @test */
    public function test_design_image_belongs_to_a_design()
    {
        // Assert that each image belongs to the design
        foreach ($this->design->images as $image) {
            $this->assertEquals($this->design->id, $image->design_id);
            $this->assertInstanceOf(Design::class, $image->design);
        }
    }

    /** @test */
    public function test_design_can_access_category()
    {
        // Menguji apakah desain dapat mengakses kategori yang terhubung dengan rencana desain yang terhubung dengannya
        $this->assertInstanceOf(DesignCategory::class, $this->design->category);
    }

    public function test_category_can_access_designs()
    {
        // Pastikan ada minimal satu kategori design dan satu design terkait di database
        $category = $this->design->category;

        // Cek bahwa method designs() pada model DesignCategory mengembalikan collection yang berisi model Design yang terkait dengan kategori ini
        $this->assertInstanceOf(Collection::class, $category->designs);
        $this->assertInstanceOf(Design::class, $category->designs->first());
    }
}