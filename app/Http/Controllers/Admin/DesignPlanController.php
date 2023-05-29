<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\DesignPlan;
use App\Http\Controllers\Controller;
use App\Models\Admin\DesignCategory;

class DesignPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DesignCategory::with('plans', 'plans.features')->get();

        $categoriesOutput = $categories->map(function ($cat) {
            return [
                'title' => $cat->title,
                'plans' => $cat->plans,
            ];
        });

        return view('admin.design.plans', compact('categoriesOutput'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.design.plans-create');
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
    public function show(DesignPlan $designPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignPlan $designPlan)
    {
        $plan = $designPlan->load('features');
        return view('admin.design.plans-edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesignPlan $designPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignPlan $designPlan)
    {
        //
    }
}
