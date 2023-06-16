<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\PhotographyCategory;

class PhotographyUserController extends Controller
{
    public function index()
    {
        $categories = PhotographyCategory::all();
        $routeNames = [
            'Produk' => route('user.photography.foto-produk'),
            'Pernikahan' => route('user.photography.foto-pernikahan'),
            'Acara' => route('user.photography.foto-acara'),
        ];

        return view('photography.index', compact('categories', 'routeNames'));
    }
}
