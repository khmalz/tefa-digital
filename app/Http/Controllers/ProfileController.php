<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile.index');
    }

    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $request->user()->update($data);

        return to_route('user.profile.index')->with('success', 'Successfully updated profile');
    }
}
