<?php

namespace App\Http\Controllers;

use App\Models\Admin\DesignPlan;
use App\Models\Admin\Order;
use App\Models\Admin\PhotographyPlan;
use App\Models\Admin\VideographyPlan;
use Illuminate\Http\Request;

class OrderClientController extends Controller
{
    public function list(Request $request)
    {
        // Jangan yang ada di dalam [7, 30, 100, 500]
        $defaultLength = 10;

        $orders = Order::with('orderable')->whereBelongsTo($request->user())
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

        return view('profile.order-list', compact('orders', 'defaultLength'));
    }

    public function show(Order $order)
    {
        $order->load('orderable');
        if ($order->orderable_type === 'App\Models\Admin\Design') {
            $order->orderable->load('images');
        }

        return view('profile.detail', compact('order'));
    }

    public function editDesign(Order $order)
    {
        $order->load('orderable.images');
        $plans = DesignPlan::where('design_category_id', $order->orderable->category->id)->get();

        return view('profile.order-edit.design', compact('order', 'plans'));
    }

    public function editPhotography(Order $order)
    {
        $order->load('orderable');
        $plans = PhotographyPlan::where('photography_category_id', $order->orderable->category->id)->get();

        return view('profile.order-edit.photography', compact('order', 'plans'));
    }

    public function editVideography(Order $order)
    {
        $order->load('orderable');
        $plans = VideographyPlan::where('videography_category_id', $order->orderable->category->id)->get();

        return view('profile.order-edit.videography', compact('order', 'plans'));
    }

    public function editPrinting(Order $order)
    {
        $order->load('orderable');

        return view('profile.order-edit.printing', compact('order'));
    }
}
