<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class MixCaseULID
{
   /**
    * Generate ULID
    *
    * @return string
    */
   public static function generate(): string
   {
      $ulid = (string) Str::ulid();

      $mixCaseChars = array_map(function ($ch) {
         return rand(0, 1) ? strtolower($ch) : strtoupper($ch);
      }, str_split($ulid));
      $mixCaseUlid = implode("", $mixCaseChars);

      return $mixCaseUlid;
   }
}