<?php

namespace App\Http\Controllers;

use App\Models\Admin\DesignCategory;
use Illuminate\Http\Request;

class DesignUserController extends Controller
{
    public function index()
    {
        $categories = DesignCategory::all();
        $routeNames = [
            'Logo' => route('user.design.design-logo'),
            'Promosi Digital' => route('user.design.design-promosi'),
            '3D' => route('user.design.design-3d'),
        ];

        return view('design.index', compact('categories', 'routeNames'));
    }
}
