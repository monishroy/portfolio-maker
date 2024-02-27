<?php

namespace App\Livewire\Backend;

use App\Models\Template as ModelsTemplate;
use Livewire\Component;

class Template extends Component
{

    public $id;

    public function delete($id)
    {
        $this->id = $id;
    }

    public function distroy()
    {
        ModelsTemplate::find($this->id)->delete();

        $this->resetInput();

        session()->flash('success', 'Template Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset(['id']);
    }

    public function render()
    {
        $data['templates'] = ModelsTemplate::all();

        return view('livewire.backend.template', $data);
    }
}
