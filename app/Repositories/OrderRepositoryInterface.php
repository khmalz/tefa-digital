<?php

namespace App\Repositories;

interface OrderRepositoryInterface
{
   public function getCountByStatus(string $status): int;
}
