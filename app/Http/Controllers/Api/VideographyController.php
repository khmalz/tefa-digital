<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideographyCollection;
use App\Http\Resources\VideographyResource;
use App\Models\Admin\Videography;

class VideographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): VideographyCollection
    {
        return new VideographyCollection(Videography::get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Videography $videography): VideographyResource
    {
        return new VideographyResource($videography);
    }
}
