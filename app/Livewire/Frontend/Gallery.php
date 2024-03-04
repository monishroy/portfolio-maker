<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads;

    public $photo;

    public function store()
    {
        $this->validate([
            'photo' => 'required|image|max:2024',
        ]);

        $id = Auth::user()->id;

        $user = User::find($id);

        if ($user->image == null) {
            $user->increment('persentance', 10); //User update first Persentance Add
        }

        $filename = date('dmY') . time() . "." . $this->photo->getClientOriginalExtension();
        $this->photo->storeAs("public/users/$id/", $filename);

        $image = $user->update([
            'image' => $filename,
        ]);



        if ($image) {
            session()->flash('success', 'Saved Successfully');
        } else {
            session()->flash('error', 'Something is Worng');
        }
    }

    public function resetInput()
    {
        $this->reset(['photo']);
    }

    public function render()
    {
        return view('livewire.frontend.gallery');
    }
}
