<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DesignCategory;
use Illuminate\Http\Request;

class DesignCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DesignCategory::all();
        return view('admin.design.categories', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignCategory $designCategory)
    {
        return view('admin.design.categories-edit', compact('designCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesignCategory $designCategory)
    {
        //
    }
}
