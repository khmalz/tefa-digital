<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Admin\DesignCategory;
use Illuminate\Support\Facades\File;

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
            File::delete(public_path("assets/img/$designCategory->image"));

            $image = $request->file('image')->store('sub-category/design', ['disk' => 'public-dir']);
        }

        $data['image'] = $image ?? $designCategory->image;
        $designCategory->update($data);

        return to_route('design-category.index')->with('success', "You're successfully updated the data");
    }
}
