<?php

namespace App\Services;

use App\Services\OrderServiceInterface;
use App\Repositories\OrderRepositoryInterface;

class OrderService implements OrderServiceInterface
{
   protected $orderRepository;

   public function __construct(OrderRepositoryInterface $orderRepository)
   {
      $this->orderRepository = $orderRepository;
   }

   public function getPendingOrderCount(): int
   {
      return $this->orderRepository->getCountByStatus('pending');
   }

   public function getInProgressOrderCount(): int
   {
      return $this->orderRepository->getCountByStatus('progress');
   }

   public function getCompletedOrderCount(): int
   {
      return $this->orderRepository->getCountByStatus('completed');
   }
}
