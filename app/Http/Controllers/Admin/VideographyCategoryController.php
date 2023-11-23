<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Admin\VideographyCategory;
use App\Http\Requests\Admin\CategoryRequest;

class VideographyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = VideographyCategory::all();
        return view('admin.videography.categories', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideographyCategory $videographyCategory)
    {
        return view('admin.videography.categories-edit', compact('videographyCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, VideographyCategory $videographyCategory, CategoryService $categoryService)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            $image = $categoryService->updateCategoryImage($videographyCategory, $request->file('image'), 'videography');
        }

        $data['image'] = $image ?? $videographyCategory->image;
        $videographyCategory->update($data);

        return to_route('videography-category.index')->with('success', "You're successfully updated the data");
    }
}
