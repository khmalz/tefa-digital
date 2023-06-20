<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Printing;
use Illuminate\Http\Request;

class PrintingController extends Controller
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
    public function show(Printing $printing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Printing $printing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Printing $printing)
    {
        $printing->update([
            'status' => $request->status
        ]);

        return back()->with('success', "You're Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Printing $printing)
    {
        //
    }
}
