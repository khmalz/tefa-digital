<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Http\Request;

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
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image ?? fake()->filePath(),
        ];

        $photographyCategory->update($data);

        return to_route('photography-category.index')->with('success', "You're successfully updated the data");
    }
}
