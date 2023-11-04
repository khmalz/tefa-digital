<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Design;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderListController extends Controller
{
    public function design(): View
    {
        $designs = Design::with('order', 'category')->get();

        return view('admin.order.design', compact('designs'));
    }

    public function photography(): View
    {
        return view('admin.order.photography');
    }

    public function videography(): View
    {
        return view('admin.order.videography');
    }

    public function printing(): View
    {
        return view('admin.order.printing');
    }

    public function index(): View
    {
        return view('admin.order.index');
    }

    public function show(\App\Models\Admin\Order $order)
    {
        $order->load('design.images');

        // Lakukan operasi yang diperlukan dengan objek Order
        return view('admin.order.detail', compact('order'));
    }
}
