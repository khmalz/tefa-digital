<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Portfolio;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Portfolio::getSortedCategories();
        $portfolios = Portfolio::all();

        return view('admin.portfolio.index', compact('categories', 'portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Portfolio::getSortedCategories();

        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datas = [
            'title' => $request->title,
            'category' => $request->category,
            'path' => $request->path ?? fake()->filePath(),
        ];

        Portfolio::create($datas);

        return to_route('portfolio.index')->with('success', 'Data have been created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Portfolio::getSortedCategories();

        return view('admin.portfolio.edit', compact('categories', 'portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $datas = [
            'title' => $request->title,
            'category' => $request->category,
            'path' => $request->path ?? fake()->filePath(),
        ];

        $portfolio->update($datas);

        return to_route('portfolio.index')->with('success', 'Changes have been saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return to_route('portfolio.index')->with('success', 'Data have been deleted');
    }
}
