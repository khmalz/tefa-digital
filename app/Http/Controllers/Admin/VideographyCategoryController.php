<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\VideographyCategory;

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
    public function update(CategoryRequest $request, VideographyCategory $videographyCategory)
    {
        $data = $request->validated();

        if ($request->has('image')) {
            Storage::delete($videographyCategory->image);

            $image = $request->file('image')->store('videographyCategories');
        }

        $data['image'] = $image ?? $videographyCategory->image;
        $videographyCategory->update($data);

        return to_route('videography-category.index')->with('success', "You're successfully updated the data");
    }
}
