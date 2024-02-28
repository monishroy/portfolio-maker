<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class BasicInfo extends Component
{
    #[Rule([
        'first_name' => ['required'],
        'last_name' => ['required'],
        'phone' => ['required', 'numeric'],
        'email' => ['required', 'email:filter'],
        'username' => ['required', 'alpha_dash', 'min:4'],
        'designation' => ['required', 'max:45'],
        'bio' => ['required'],
    ])]

    public $id, $first_name, $last_name, $phone, $email, $username, $designation, $bio;

    public function update()
    {
        $id = Auth::user()->id;

        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email:filter',
            'username' => 'required|alpha_dash|min:4|unique:users,username,' . $id,
            'designation' => 'required|max:45',
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

        if ($user) {
            session()->flash('success', 'Update Successfully');
        } else {
            session()->flash('error', 'Something is Worng');
        }
    }

    public function mount()
    {
        $user = Auth::user();

        $this->first_name = $user->fname;
        $this->last_name = $user->lname;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->designation = $user->designation;
        $this->bio = $user->bio;
    }

    public function render()
    {



        return view('livewire.frontend.basic-info');
    }
}
