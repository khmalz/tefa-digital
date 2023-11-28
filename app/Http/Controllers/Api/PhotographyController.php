<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhotographyCollection;
use App\Http\Resources\PhotographyResource;
use App\Models\Admin\Photography;

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): PhotographyCollection
    {
        return new PhotographyCollection(Photography::get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Photography $photography): PhotographyResource
    {
        return new PhotographyResource($photography);
    }
}
