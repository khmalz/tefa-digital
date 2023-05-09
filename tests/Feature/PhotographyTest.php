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
    public function a_photography_belongs_to_a_category()
    {
        // Assert that the photography belongs to a category
        $this->assertNotNull($this->photography->category);
        $this->assertInstanceOf(PhotographyCategory::class, $this->photography->category);
    }

    /** @test */
    public function a_photography_category_has_many_photographies()
    {
        // Assert that the category has many photographies
        $this->assertNotNull($this->photography->category->photographies);
        $this->assertInstanceOf(Collection::class, $this->photography->category->photographies);
        $this->assertInstanceOf(Photography::class, $this->photography->category->photographies->first());
    }

    /** @test */
    public function a_photography_category_has_many_plans()
    {
        // Assert that the category has many plans
        $this->assertNotNull($this->photography->category->plans);
        $this->assertInstanceOf(Collection::class, $this->photography->category->plans);
        $this->assertInstanceOf(PhotographyPlan::class, $this->photography->category->plans->first());
    }

    /** @test */
    public function a_photography_plan_has_many_features()
    {
        // Assert that the plan has many features
        $features = $this->photography->category->plans->flatMap(function ($plan) {
            return $plan->features;
        });

        $this->assertNotNull($features);
        $this->assertInstanceOf(Collection::class, $features);
        $this->assertInstanceOf(PhotographyFeature::class, $features->first());
    }

    /** @test */
    public function a_photography_feature_has_plan()
    {
        // Retrieve all features for the photography's category plans
        $features = $this->photography->category->plans->flatMap(function ($plan) {
            return $plan->features;
        });

        // Assert that the photography feature has a plan
        $this->assertNotNull($features->first()->plan);
        $this->assertInstanceOf(PhotographyPlan::class, $features->first()->plan);
        $this->assertInstanceOf(PhotographyFeature::class, $features->first()->plan->features->first());
    }

}