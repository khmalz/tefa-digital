<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Models\Admin\DesignCategory;
use App\Http\Requests\Admin\CategoryRequest;

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
    public function update(CategoryRequest $request, DesignCategory $designCategory, CategoryService $categoryService)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $image = $categoryService->updateCategoryImage($designCategory, $request->file('image'), 'design');
        }

        $data['image'] = $image ?? $designCategory->image;
        $designCategory->update($data);

        return to_route('design-category.index')->with('success', "You're successfully updated the data");
    }
}
