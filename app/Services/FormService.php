<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class FormService
{
   /**
    * Upload a file or image to Storage.
    */
   public function uploadedFile(UploadedFile $file, string $category): string
   {
      $filePath = $file->store("order/{$category}");

      return $filePath;
   }
}
