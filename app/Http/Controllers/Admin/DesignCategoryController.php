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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DesignCategory $designCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignCategory $designCategory)
    {
        return view('admin.design.categories-edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesignCategory $designCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignCategory $designCategory)
    {
        //
    }
}
