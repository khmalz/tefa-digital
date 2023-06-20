<?php

namespace App\Repositories;

use App\Repositories\OrderRepositoryInterface;
use App\Models\Admin\Design;
use App\Models\Admin\Photography;
use App\Models\Admin\Printing;
use App\Models\Admin\Videography;

class OrderRepository implements OrderRepositoryInterface
{
   public function getCountByStatus(string $status): int
   {
      $count = Design::byStatus($status)->count()
         + Photography::byStatus($status)->count()
         + Videography::byStatus($status)->count()
         + Printing::byStatus($status)->count();

      return $count;
   }
}
