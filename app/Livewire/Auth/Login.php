<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{

    #[Rule([
        'email' => ['required', 'lowercase', 'email:filter', 'max:255'],
        'password' => ['required', 'min:6'],
    ])]

    public $email, $password, $remember;

    public function login()
    {
        $user = $this->validate([
            'email' => 'required|lowercase|email:filter|max:255',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($user, $this->remember)) {
            if (Auth::user()->role_id == 1) {
                return redirect()->route('backend.dashboard');
            } else {
                return redirect()->route('frontend.profile');
            }
        } else {
            return back()->with('error', 'Please enter valid details!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
