<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Design;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderListController extends Controller
{
    public function index(): View
    {
        return view('admin.order.index');
    }

    public function show(Design $design): View
    {
        $design = $design->load('images');

        return view('admin.order.detail', compact('design'));
    }
}
