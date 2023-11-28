<?php

namespace App\Repositories;

use App\Models\Admin\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function getCountByStatus(string $status): int
    {
        $count = Order::byStatus($status)->count();

        return $count;
    }
}
