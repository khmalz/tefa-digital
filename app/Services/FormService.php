<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

   public function deletedUploadedFile(string $filePath): void
   {
      if (Storage::exists($filePath)) {
         Storage::delete($filePath);
      }
   }
}
