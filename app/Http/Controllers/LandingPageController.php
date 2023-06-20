<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use App\Models\Admin\Portfolio;

class LandingPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $contact = Contact::first();
        $portfolioCategories = Portfolio::getSortedCategories();

        $minPortfolios = collect();
        foreach ($portfolioCategories as $category) {
            $selectPortfolio = Portfolio::where('category', $category)->first();

            $minPortfolios->push($selectPortfolio);
        }

        $allPortfolios = Portfolio::inRandomOrder()->get();

        $portfolios = $minPortfolios->merge($allPortfolios);

        return view('index', compact('contact', 'portfolioCategories', 'portfolios'));
    }
}
