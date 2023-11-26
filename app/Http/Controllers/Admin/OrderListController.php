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
                return $query->whereHasMorph('orderable', ['App\Models\Admin\\'.$request->category], null);
            })
            ->when($request->has('date'), function ($query) use ($request) {
                switch ($request->date) {
                    case 'week':
                        return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    case 'month':
                        return $query->whereMonth('created_at', now()->month);
                    case 'year':
                        return $query->whereYear('created_at', now()->year);
                    case 'all':
                        return $query;
                    default:
                        return $query->whereDate('created_at', now());
                }
            }, function ($query) {
                // Query default jika parameter date tidak ada
                return $query->whereDate('created_at', now());
            })->when($request->has('type'), function ($query) {
                $query->where('status', 'cancel');
            }, function ($query) {
                $query->where('status', '!=', 'cancel');
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
