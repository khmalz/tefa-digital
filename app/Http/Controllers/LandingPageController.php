<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Contact;

class LandingPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $contact = Contact::first();
        return view('index', compact('contact'));
    }
}
