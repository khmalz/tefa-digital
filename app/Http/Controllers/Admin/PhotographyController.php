<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Photography;
use App\Http\Controllers\Controller;

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Photography $photography)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photography $photography)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photography $photography)
    {
        $photography->update([
            'status' => $request->status
        ]);

        return back()->with('success', "You're Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photography $photography)
    {
        //
    }
}
