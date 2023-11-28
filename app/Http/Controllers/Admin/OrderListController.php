<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Notifications\OrderNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderListController extends Controller
{
    /**
     * Retrieves all orders based on the given request.
     */
    public function all(Request $request): View
    {
        // Jangan yang ada di dalam [7, 30, 100, 500]
        $defaultLength = 10;

        $orders = Order::with('orderable')
            ->when($request->has('category') && in_array($request->category, ['design', 'photography', 'videography', 'printing']), function ($query) use ($request) {
                return $query->whereCategory($request->category);
            })
            ->when($request->has('period'), function ($query) use ($request) {
                return $query->whereFilterByTimePeriod($request->period);
            }, function ($query) {
                return $query->whereDate('created_at', now());
            })->when($request->has('type'), function ($query) {
                $query->whereCanceledOrders();
            }, function ($query) {
                $query->whereNotCanceledOrders();
            })
            ->paginate($defaultLength);

        return view('admin.order.all', compact('orders', 'defaultLength'));
    }

    /**
     * Show the order details.
     */
    public function show(Order $order): View
    {
        $order->load('orderable');
        if ($order->orderable_type === 'App\Models\Admin\Design') {
            $order->orderable->load('images');
        }

        return view('admin.order.detail', compact('order'));
    }

    /**
     * Updates the status of an order.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        $order->update([
            'status' => $request->status,
        ]);

        $order->user->notify(new OrderNotification($order->ulid, $order->user_id, $order->status));

        return back()->with('success', "You're successfully updated status a order");
    }
}
