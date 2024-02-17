<?php

namespace App\Livewire\Backend;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class User extends Component
{

    use WithPagination;

    #[Rule([
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required', 'email:filter'],
        'status' => ['required'],
        'role' => ['required'],
    ])]

    public $id, $search, $size = "10", $role_id, $first_name, $last_name, $email, $status = "1", $password, $role = "2";

    public function edit($id)
    {
        $user = ModelsUser::find($id);

        if ($user) {
            $this->id = $user->id;
            $this->first_name = $user->fname;
            $this->last_name = $user->lname;
            $this->email = $user->email;
            $this->status = $user->status;
            $this->role = $user->role_id;
        } else {
            return redirect()->route('users.index');
        }
    }

    //User Update
    public function update()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:filter|unique:users,email,' . $this->id,
            'status' => 'required',
            'role' => 'required',
            'password' => 'nullable|min:6',
        ]);

        if (!empty($this->password)) {
            ModelsUser::find($this->id)->update([
                'password' => Hash::make($this->password),
            ]);
        }

        $user = ModelsUser::find($this->id)->update([
            'fname' => $this->first_name,
            'lname' => $this->last_name,
            'email' => $this->email,
            'role_id' => $this->role,
            'status' => $this->status,
        ]);

        $user = ModelsUser::where('id', $this->id)->first();

        $user->syncRoles($this->role);

        $this->dispatch('close-model');

        $this->resetInput();

        if ($user) {
            session()->flash('success', 'User Update Successfully.');
        } else {
            session()->flash('error', 'Something is worng!');
        }
    }

    //User Store
    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:filter|unique:users,email',
            'status' => 'required',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = ModelsUser::create([
            'fname' => $this->first_name,
            'lname' => $this->last_name,
            'email' => $this->email,
            'role_id' => $this->role,
            'status' => $this->status,
            'is_verified' => '1',
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles($this->role);

        $this->resetInput();

        if ($user) {
            session()->flash('success', 'Account Create Successfully.');
        } else {
            session()->flash('error', 'Something is worng!');
        }
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function distroy()
    {
        $user = ModelsUser::find($this->id)->delete();

        $this->resetInput();

        session()->flash('succes', 'User Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->reset(['id', 'search', 'size', 'first_name', 'last_name', 'email', 'status', 'password', 'role']);
    }
    public function render()
    {
        $query = ModelsUser::with('roles')->latest();

        $data = [];

        if ($this->role_id == null) {
            $data['users'] = $query
                ->where('fname', 'like', "%{$this->search}%")
                ->where('email', 'like', "%{$this->search}%")
                ->paginate($this->size);
        } else {
            $data['users'] = $query
                ->where('fname', 'like', "%{$this->search}%")
                ->where('email', 'like', "%{$this->search}%")
                ->where('role_id', '=', "$this->role_id")
                ->paginate($this->size);
        }

        $data['total_user'] = ModelsUser::count();
        $data['roles'] = Role::all();
        return view('livewire.backend.user', $data);
    }
}
