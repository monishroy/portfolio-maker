<?php

namespace App\Livewire\Frontend;

use App\Models\Language as ModelsLanguage;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Language extends Component
{
    #[Rule([
        'name' => ['required'],
    ])]

    public $id, $name;

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $skill = ModelsLanguage::create([
            'name' => $this->name,
            'user_id' => Auth::user()->id,
        ]);

        $this->resetInput();

        if ($skill) {
            session()->flash('success', 'Language Added Successfully');
        } else {
            session()->flash('error', 'Something is Worng');
        }
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function distroy()
    {
        ModelsLanguage::find($this->id)->delete();

        $this->resetInput();

        session()->flash('success', 'Language Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset(['id', 'name']);
    }

    public function render()
    {
        $data['languages'] = ModelsLanguage::where('user_id', Auth::user()->id)->get();

        return view('livewire.frontend.language', $data);
    }
}
