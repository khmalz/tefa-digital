<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\PhotographyCategory;

class PhotographyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PhotographyCategory::all();
        return view('admin.photography.categories', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotographyCategory $photographyCategory)
    {
        return view('admin.photography.categories-edit', compact('photographyCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotographyCategory $photographyCategory)
    {
        if ($request->has('image')) {
            Storage::delete($photographyCategory->image);

            $image = $request->file('image')->store('photographyCategories');
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image ?? $photographyCategory->image,
        ];

        $photographyCategory->update($data);

        return to_route('photography-category.index')->with('success', "You're successfully updated the data");
    }
}
