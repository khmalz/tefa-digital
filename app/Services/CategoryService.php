<?php

namespace App\Services;

use Illuminate\Support\Facades\File;


class CategoryService
{
   public function updateCategoryImage($category, $image, $subCategory)
   {
      $this->deleteCategoryImage($category);

      $image = $image->store("sub-category/$subCategory", ['disk' => 'public-dir']);

      return $image;
   }

   public function deleteCategoryImage($category)
   {
      if ($category->image) {
         File::delete(public_path("assets/img/{$category->image}"));
      }
   }
}
