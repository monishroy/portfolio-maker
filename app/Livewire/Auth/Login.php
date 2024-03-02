<?php

namespace App\Livewire\Auth;

use App\Models\User;
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
                if (session()->has('template.id')) {
                    $template_id = session()->get('template.id');

                    User::find(Auth::user()->id)->update([
                        'template_id' => $template_id,
                    ]);

                    return redirect()->route('frontend.profile');
                }
                return redirect()->route('frontend.dashboard');
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
