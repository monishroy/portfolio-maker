<?php

namespace App\Livewire\Frontend\Temp1;

use App\Models\Message;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Contact extends Component
{
    #[Rule([
        'name' => ['required'],
        'email' => ['required'],
        'message' => ['required'],
    ])]

    public $user_info, $name, $email, $message;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $id = $this->user_info->id;

        $message = Message::create([
            'user_id' => $id,
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->resetInput();

        if ($message) {
            session()->flash('success', 'Message Send Successfully');
        } else {
            session()->flash('error', 'Something is Worng');
        }
    }

    public function resetInput()
    {
        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.frontend.temp1.contact');
    }
}
