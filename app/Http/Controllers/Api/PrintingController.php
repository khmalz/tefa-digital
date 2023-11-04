<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrintingCollection;
use App\Http\Resources\PrintingResource;
use App\Models\Admin\Printing;

class PrintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): PrintingCollection
    {
        return new PrintingCollection(Printing::get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Printing $printing): PrintingResource
    {
        return new PrintingResource($printing);
    }
}
