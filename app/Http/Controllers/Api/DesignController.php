<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DesignCollection;
use App\Http\Resources\DesignResource;
use App\Models\Admin\Design;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): DesignCollection
    {
        return new DesignCollection(Design::get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Design $design): DesignResource
    {
        return new DesignResource($design);
    }
}
