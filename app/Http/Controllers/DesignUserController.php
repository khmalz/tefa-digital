<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\DesignCategory;

class DesignUserController extends Controller
{
    public function index()
    {
        $categories = DesignCategory::all();
        $routeNames = [
            'Logo' => route('user.design.design-logo', '#pricing'),
            'Promosi Digital' => route('user.design.design-promosi', '#pricing'),
            '3D' => route('user.design.design-3d', '#pricing'),
        ];

        return view('design.index', compact('categories', 'routeNames'));
    }

    public function logo()
    {
        $category = DesignCategory::where('title', 'Logo')->with('plans.features')->first();

        return view('design.design-logo', compact('category'));
    }

    public function promosi()
    {
        $category = DesignCategory::where('title', 'Promosi Digital')->with('plans.features')->first();

        return view('design.design-promosi', compact('category'));
    }

    public function threeD()
    {
        $category = DesignCategory::where('title', '3D')->with('plans.features')->first();

        return view('design.design-3D', compact('category'));
    }
}
