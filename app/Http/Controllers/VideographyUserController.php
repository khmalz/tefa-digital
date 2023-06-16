<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\VideographyCategory;

class VideographyUserController extends Controller
{
    public function index()
    {
        $categories = VideographyCategory::all();
        $routeNames = [
            'Video Syuting' => route('user.videography.vid-syuting'),
            'Video Dokumentasi' => route('user.videography.vid-dokumentasi'),
        ];

        return view('videography.index', compact('categories', 'routeNames'));
    }
}
