<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ChangePassword extends Component
{
    #[Rule([
        'old_password' => ['required'],
        'new_password' => ['required'],
        'confirm_password' => ['required', 'same:new_password'],
    ])]

    public $old_password, $new_password, $confirm_password;

    public function update()
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (Hash::check($this->old_password, $user->password)) {
            User::find($user->id)->update([
                'password' => $this->new_password,
            ]);
            $this->resetInput();

            session()->flash('success', 'Password Change Successfully.');
        } else {

            $this->reset(['old_password']);

            session()->flash('error', 'Please enter your vaild password');
        }
    }

    public function resetInput()
    {
        $this->reset(['old_password', 'new_password', 'confirm_password']);
    }

    public function render()
    {
        return view('livewire.frontend.change-password');
    }
}
