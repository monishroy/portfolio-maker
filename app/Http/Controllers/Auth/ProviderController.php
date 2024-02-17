<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::where('email', $socialUser->email)->first();

            if ($user) {
                if ($user->provider_id == null) {
                    return redirect()->route('login')->with('error', 'This email user different method to login.');
                } else {
                    $name_parts = explode(" ", $socialUser->name);

                    $user = User::updateOrCreate([
                        'provider_id' => $socialUser->id,
                    ], [
                        'fname' => $name_parts[0],
                        'lname' => $name_parts[1],
                        'image' => $socialUser->avatar,
                        'email' => $socialUser->email,
                        'is_verified' => '1',
                        'provider' => $provider,
                        'provider_token' => $socialUser->token,
                    ]);

                    $role = Role::find(2);
                    $user->assignRole($role);

                    Auth::login($user);

                    return redirect('/');
                }
            } else {
                $name_parts = explode(" ", $socialUser->name);

                $user = User::updateOrCreate([
                    'provider_id' => $socialUser->id,
                ], [
                    'fname' => $name_parts[0],
                    'lname' => $name_parts[1],
                    'image' => $socialUser->avatar,
                    'email' => $socialUser->email,
                    'is_verified' => '1',
                    'provider' => $provider,
                    'provider_token' => $socialUser->token,
                ]);

                $role = Role::find(2);
                $user->assignRole($role);

                Auth::login($user);

                return redirect('/');
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
