<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Services\OrderServiceInterface;

class DashboardController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display of index
     */
    public function __invoke(): View
    {
        $pending = $this->orderService->getPendingOrderCount();
        $progress = $this->orderService->getInProgressOrderCount();
        $completed = $this->orderService->getCompletedOrderCount();

        return view('dashboard.index', compact('pending', 'progress', 'completed'));
    }
}
