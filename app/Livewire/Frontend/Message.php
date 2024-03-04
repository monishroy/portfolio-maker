<?php

namespace App\Livewire\Frontend;

use App\Models\Message as ModelsMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Message extends Component
{
    use WithPagination;

    public $id, $search, $size = '10', $status;

    public function delete($id)
    {
        $this->id = $id;
    }

    public function distroy()
    {
        ModelsMessage::find($this->id)->delete();

        $this->resetInput();

        session()->flash('succes', 'Message Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset(['id', 'search']);
    }

    public function render()
    {
        $query = ModelsMessage::where('user_id', Auth::user()->id)->latest();

        $data = [];

        if ($this->status == null) {
            $data['messages'] = $query
                ->where('email', 'like', "%{$this->search}%")
                ->paginate($this->size);
        } else {
            $data['messages'] = $query
                ->where('email', 'like', "%{$this->search}%")
                ->where('status', '=', "$this->status")
                ->paginate($this->size);
        }

        $data['total_messages'] = ModelsMessage::count();

        return view('livewire.frontend.message', $data);
    }
}
