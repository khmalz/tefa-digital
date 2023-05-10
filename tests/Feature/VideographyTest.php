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
   public function test_videography_belongs_to_a_plan()
   {
      // Assert that the videography belongs to a plan
      $this->assertNotNull($this->videography->plan);
      $this->assertInstanceOf(VideographyPlan::class, $this->videography->plan);
   }

   /** @test */
   public function test_videography_plan_has_many_videographies()
   {
      // Assert that the plan has many videographies
      $this->assertNotNull($this->videography->plan->videographies);
      $this->assertInstanceOf(Collection::class, $this->videography->plan->videographies);
      $this->assertInstanceOf(Videography::class, $this->videography->plan->videographies->first());
   }

   public function test_videography_category_has_many_plans()
   {
      $category = $this->videography->plan->category;

      $this->assertNotNull($category->plans);
      $this->assertInstanceOf(Collection::class, $category->plans);
      $this->assertInstanceOf(VideographyPlan::class, $category->plans->first());
   }

   public function test_videography_plan_belongs_to_one_videography_category()
   {
      $category = $this->videography->plan->category;

      $this->assertNotNull($category);
      $this->assertInstanceOf(VideographyCategory::class, $category);
   }

   /** @test */
   public function test_videography_plan_has_many_features()
   {
      // Assert that the plan has many features
      $this->assertNotNull($this->videography->plan->features);
      $this->assertInstanceOf(Collection::class, $this->videography->plan->features);
      $this->assertInstanceOf(VideographyFeature::class, $this->videography->plan->features->first());

      // Assert that each feature belongs to the plan
      foreach ($this->videography->plan->features as $feature) {
         $this->assertEquals($this->videography->plan->id, $feature->videography_plan_id);
      }
   }


   /** @test */
   public function test_videography_feature_belongs_to_a_videography_plan()
   {
      // Assert that the feature belongs to a plan
      $this->assertNotNull($this->videography->plan->features->first()->plan);
      $this->assertInstanceOf(VideographyPlan::class, $this->videography->plan->features->first()->plan);
   }

   /** @test */
   public function test_videography_can_access_category()
   {
      // Menguji apakah desain dapat mengakses kategori yang terhubung dengan rencana desain yang terhubung dengannya
      $this->assertInstanceOf(VideographyCategory::class, $this->videography->category);
   }
}