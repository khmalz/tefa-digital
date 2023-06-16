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

    public function produk()
    {
        $category = PhotographyCategory::where('title', 'Produk')->with('plans.features')->first();

        return view('photography.foto-produk', compact('category'));
    }

    public function pernikahan()
    {
        $category = PhotographyCategory::where('title', 'Pernikahan')->with('plans.features')->first();

        return view('photography.foto-pernikahan', compact('category'));
    }

    public function acara()
    {
        $category = PhotographyCategory::where('title', 'Acara')->with('plans.features')->first();

        return view('photography.foto-acara', compact('category'));
    }
}
