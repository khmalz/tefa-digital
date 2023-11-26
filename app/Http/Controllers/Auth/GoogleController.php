<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function handleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $findUser = User::where('email', $googleUser->getEmail())->where('social_type', 'google')->first();

            if ($findUser) {
                $findUser->update([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'social_id' => $googleUser->getId(),
                    'social_type' => 'google',
                ]);
            } else {
                // Jika pengguna dengan email yang sama belum ada dalam database
                $findUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'social_id' => $googleUser->getId(),
                    'social_type' => 'google',
                    'password' => bcrypt(\Illuminate\Support\Str::uuid()->toString().\Illuminate\Support\Str::uuid()->toString()),
                    'picture' => $googleUser->getAvatar(),
                ]);

                $findUser->assignRole('client');
            }

            Auth::login($findUser);

            return redirect()->intended(route('home'))->with('google-success', 'Successfully Login With Google');
        } catch (\Exception $e) {
            return redirect()->route('login.index')->with('failure', $e->getMessage());
        }
    }
}
