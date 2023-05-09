<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin\Videography;
use Illuminate\Support\Collection;
use App\Models\Admin\VideographyPlan;
use App\Models\Admin\VideographyFeature;
use App\Models\Admin\VideographyCategory;
use Illuminate\Foundation\Testing\WithFaker;

class VideographyTest extends TestCase
{
   protected $videography;

   public function setUp(): void
   {
      parent::setUp();

      $this->videography = Videography::first();
   }

   /** @test */
   public function a_videography_belongs_to_a_category()
   {
      // Assert that the videography belongs to a category
      $this->assertNotNull($this->videography->category);
      $this->assertInstanceOf(VideographyCategory::class, $this->videography->category);
   }

   /** @test */
   public function a_videography_category_has_many_videographies()
   {
      // Assert that the category has many videographies
      $this->assertNotNull($this->videography->category->videographies);
      $this->assertInstanceOf(Collection::class, $this->videography->category->videographies);
      $this->assertInstanceOf(Videography::class, $this->videography->category->videographies->first());
   }

   /** @test */
   public function a_videography_category_has_many_plans()
   {
      // Assert that the category has many plans
      $this->assertNotNull($this->videography->category->plans);
      $this->assertInstanceOf(Collection::class, $this->videography->category->plans);
      $this->assertInstanceOf(VideographyPlan::class, $this->videography->category->plans->first());
   }

   /** @test */
   public function a_videography_plan_has_many_features()
   {
      // Assert that the plan has many features
      $features = $this->videography->category->plans->flatMap(function ($plan) {
         return $plan->features;
      });

      $this->assertNotNull($features);
      $this->assertInstanceOf(Collection::class, $features);
      $this->assertInstanceOf(VideographyFeature::class, $features->first());
   }

   /** @test */
   public function a_videography_feature_has_many_plans()
   {
      // Retrieve all features for the videography's category plans
      $features = $this->videography->category->plans->flatMap(function ($plan) {
         return $plan->features;
      });

      // Assert that the videography feature has many plans
      $this->assertNotNull($features->first()->plan);
      $this->assertInstanceOf(VideographyPlan::class, $features->first()->plan);
      $this->assertInstanceOf(Collection::class, $features->first()->plan->features);
      $this->assertInstanceOf(VideographyFeature::class, $features->first()->plan->features->first());
   }
}