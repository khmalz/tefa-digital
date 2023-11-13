<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\Admin\Order;
use App\Models\Admin\Design;
use Illuminate\Http\Request;
use App\Models\Admin\Printing;
use App\Models\Admin\Photography;
use App\Models\Admin\Videography;
use App\Http\Controllers\Controller;

class OrderListController extends Controller
{

    public function all(Request $request)
    {
        // Jangan yang ada di dalam [7, 30, 100, 500]
        $defaultLength = 10;

        $orders = Order::with('orderable')
            ->when($request->has('category') && in_array($request->category, ['all', 'design', 'photography', 'videography', 'printing']), function ($query) use ($request) {
                if ($request->category !== 'all') {
                    return $query->whereHasMorph('orderable', ['App\Models\Admin\\' . $request->category], null);
                }
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
            })
            ->paginate($defaultLength);

        return view('admin.order.all', compact('orders', 'defaultLength'));
    }

    public function design(): View
    {
        $designs = Design::with('order', 'category')->get();

        return view('admin.order.design', compact('designs'));
    }

    public function photography(): View
    {
        $photographies = Photography::with('order', 'category')->get();

        return view('admin.order.photography', compact('photographies'));
    }

    public function videography(): View
    {
        $videographies = Videography::with('order', 'category')->get();

        return view('admin.order.videography', compact('videographies'));
    }

    public function printing(): View
    {
        $printings = Printing::with('order')->get();

        return view('admin.order.printing', compact('printings'));
    }

    public function show(\App\Models\Admin\Order $order)
    {
        $order->load('design.images');

        abort_if(!$order->design, 404);
        return view('admin.order.detail', compact('order'));
    }
}
