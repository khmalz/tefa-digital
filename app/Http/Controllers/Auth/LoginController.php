<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $canGoogleLogin = config('services.google.client_id') && config('services.google.client_secret');

        return view('auth.login', compact('canGoogleLogin'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['social_type'] = 'credentials';

        if (!Auth::attempt($credentials)) {
            return back()->with('fail', 'Email or password is incorrect');
        }

        $request->session()->regenerate();

        if ($request->user()->hasRole('admin')) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->intended(route('home'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
