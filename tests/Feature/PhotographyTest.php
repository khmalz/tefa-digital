<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin\Photography;
use Illuminate\Support\Collection;
use App\Models\Admin\PhotographyPlan;
use App\Models\Admin\PhotographyFeature;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Foundation\Testing\WithFaker;

class PhotographyTest extends TestCase
{
    protected $photography;

    public function setUp(): void
    {
        parent::setUp();

        $this->photography = Photography::first();
    }

    /** @test */
    public function test_photography_belongs_to_a_plan()
    {
        // Assert that the photography belongs to a plan
        $this->assertNotNull($this->photography->plan);
        $this->assertInstanceOf(PhotographyPlan::class, $this->photography->plan);
    }

    /** @test */
    public function test_photography_plan_has_many_photographies()
    {
        // Assert that the plan has many photographies
        $this->assertNotNull($this->photography->plan->photographies);
        $this->assertInstanceOf(Collection::class, $this->photography->plan->photographies);
        $this->assertInstanceOf(Photography::class, $this->photography->plan->photographies->first());
    }

    public function test_photography_category_has_many_plans()
    {
        $category = $this->photography->plan->category;

        $this->assertNotNull($category->plans);
        $this->assertInstanceOf(Collection::class, $category->plans);
        $this->assertInstanceOf(PhotographyPlan::class, $category->plans->first());
    }

    public function test_photography_plan_belongs_to_one_photography_category()
    {
        $category = $this->photography->plan->category;

        $this->assertNotNull($category);
        $this->assertInstanceOf(PhotographyCategory::class, $category);
    }

    /** @test */
    public function test_photography_plan_has_many_features()
    {
        // Assert that the plan has many features
        $this->assertNotNull($this->photography->plan->features);
        $this->assertInstanceOf(Collection::class, $this->photography->plan->features);
        $this->assertInstanceOf(PhotographyFeature::class, $this->photography->plan->features->first());

        // Assert that each feature belongs to the plan
        foreach ($this->photography->plan->features as $feature) {
            $this->assertEquals($this->photography->plan->id, $feature->photography_plan_id);
        }
    }


    /** @test */
    public function test_photography_feature_belongs_to_a_photography_plan()
    {
        // Assert that the feature belongs to a plan
        $this->assertNotNull($this->photography->plan->features->first()->plan);
        $this->assertInstanceOf(PhotographyPlan::class, $this->photography->plan->features->first()->plan);
    }
}