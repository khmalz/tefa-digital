<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Models\Admin\Design;
use Illuminate\Http\Request;
use App\Models\Admin\Printing;
use App\Models\Admin\Photography;
use App\Models\Admin\Videography;
use App\Http\Controllers\Controller;

class OrderListController extends Controller
{
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

        // Lakukan operasi yang diperlukan dengan objek Order
        return view('admin.order.detail', compact('order'));
    }
}
