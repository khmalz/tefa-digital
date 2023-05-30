<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\VideographyCategory;
use Illuminate\Http\Request;

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
    public function update(Request $request, VideographyCategory $videographyCategory)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image ?? fake()->filePath(),
        ];

        $videographyCategory->update($data);

        return to_route('videography-category.index')->with('success', "You're successfully updated the data");
    }
}
