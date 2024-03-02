<?php

namespace App\Livewire\Frontend;

use App\Models\Project as ModelsProject;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Project extends Component
{
    use WithFileUploads;

    #[Rule([
        'name' => ['required'],
        'image' => ['required', 'image', 'max:2048'],
        'description' => ['required'],
    ])]

    public $id, $name, $description, $image;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048',
            'description' => 'required',
        ]);

        $id = Auth::user()->id;

        $filename = date('dmY') . time() . "." . $this->image->getClientOriginalExtension();

        $this->image->storeAs("public/projects/", $filename);

        $project = ModelsProject::create([
            'user_id' => $id,
            'name' => $this->name,
            'image' => $filename,
            'description' => $this->description,
        ]);

        $this->resetInput();

        if ($project) {
            session()->flash('success', 'Project Added Successfully');
        } else {
            session()->flash('error', 'Something is Worng');
        }
    }

    public function resetInput()
    {
        $this->image = '';
        $this->description = '';
        $this->reset(['id', 'name', 'image', 'description']);
    }

    public function render()
    {
        $data['projects'] = ModelsProject::where('user_id', Auth::user()->id)->get();
        return view('livewire.frontend.project', $data);
    }
}
