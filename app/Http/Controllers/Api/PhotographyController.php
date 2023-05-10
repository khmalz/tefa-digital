<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Design;
use App\Models\Admin\Photography;
use App\Http\Controllers\Controller;
use App\Http\Resources\PhotographyResource;
use App\Http\Resources\PhotographyCollection;

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): PhotographyCollection
    {
        return new PhotographyCollection(Design::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Photography $photography): PhotographyResource
    {
        return new PhotographyResource($photography);
    }
}