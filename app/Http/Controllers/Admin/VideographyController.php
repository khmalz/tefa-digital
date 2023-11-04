<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Videography;
use Illuminate\Http\Request;

class VideographyController extends Controller
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
    public function show(Videography $videography)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videography $videography)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videography $videography)
    {
        $videography->order()->update([
            'status' => $request->status
        ]);

        return back()->with('success', "You're Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videography $videography)
    {
        //
    }
}
