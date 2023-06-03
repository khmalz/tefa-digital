<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DesignCategory;
use Illuminate\Support\Facades\Storage;
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
    public function update(CategoryRequest $request, DesignCategory $designCategory)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            Storage::delete($designCategory->image);

            $image = $request->file('image')->store('designCategories');
        }

        $data['image'] = $image ?? $designCategory->image;
        $designCategory->update($data);

        return to_route('design-category.index')->with('success', "You're successfully updated the data");
    }
}
