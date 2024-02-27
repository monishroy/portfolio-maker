<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class BasicInfo extends Component
{
    #[Rule([
        'first_name' => ['required', 'max:255', 'url'],
    ])]

    public $id, $first_name, $last_name, $phone, $email, $username, $designation, $bio;

    public function update()
    {
        $id = Auth::user()->id;

        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'designation' => 'required',
            'bio' => 'required',
        ]);

        $user = User::find($id)->update([
            'fname' => $this->first_name,
            'lname' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'username' => $this->username,
            'designation' => $this->designation,
            'bio' => $this->bio,
        ]);

        session()->flash('success', 'Update Successfully');
    }

    public function render()
    {

        $user = Auth::user();

        $this->first_name = $user->fname;
        $this->last_name = $user->lname;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->designation = $user->designation;
        $this->bio = $user->bio;

        return view('livewire.frontend.basic-info');
    }
}
