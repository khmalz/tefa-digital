<?php

namespace App\Services;

interface OrderServiceInterface
{
    public function getPendingOrderCount(): int;

    public function getInProgressOrderCount(): int;

    public function getCompletedOrderCount(): int;
}
