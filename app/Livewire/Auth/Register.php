<?php

namespace App\Livewire\Auth;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Register extends Component
{
    #[Rule([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => ['required', 'lowercase', 'email:filter', 'max:255', 'unique:users,email'],
        'phone' => ['required', 'numeric', 'digits:11', 'unique:users,phone'],
        'password' => ['required', 'min:6'],
    ])]

    public $first_name, $last_name, $email, $phone, $password;

    public function register()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|lowercase|email:filter|unique:users,email',
            'phone' => 'required|numeric|digits:11|unique:users,phone',
            'password' => 'required|min:6',
        ]);

        //User Store
        $user = ModelsUser::create([
            'fname' => $this->first_name,
            'lname' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_id' => '2',
            'password' => Hash::make($this->password),
        ]);

        $role = ModelsRole::find(2);
        $role->syncPermissions(Permission::all());
        $user->assignRole($role);

        $this->resetInput();

        if($user){
            return redirect("/send-mail/".$user->id);
        }else{
            session()->flash('error','Something is Worng!');
        }
    }

    public function resetInput()
    {
        $this->reset(['first_name','last_name','email','phone','password']);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
