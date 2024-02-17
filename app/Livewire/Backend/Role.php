<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    use WithPagination;

    public $role_id, $search, $size="10";

    public function delete($role_id)
    {
        $this->role_id = $role_id;
    }

    public function distroy()
    {
        $role = ModelsRole::find($this->role_id)->delete();

        $this->resetInput();

        session()->flash('succes','Role Delete Successfully');
    }

    public function closeModel()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset(['role_id','search']);
    }

    public function render()
    {
        $data['roles'] = ModelsRole::with('permissions')
        ->latest()
        ->where('name','like',"%{$this->search}%")
        ->paginate($this->size);

        $data['total_role'] = ModelsRole::count();
        return view('livewire.backend.role', $data);
    }
}
