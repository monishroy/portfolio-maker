<?php

namespace App\Livewire\Frontend;

use App\Models\SocialMedia as ModelsSocialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class SocialMedia extends Component
{
    #[Rule([
        'social' => ['required'],
        'link' => ['required', 'url'],
    ])]

    public $id, $social = 'bx bxl-facebook-square', $link;

    public function store()
    {
        $this->validate([
            'social' => 'required',
            'link' => 'required|url',
        ]);

        $id = Auth::user()->id;

        $social = ModelsSocialMedia::where('user_id', $id)->get();

        if (count($social) == 0) {
            $user = User::find($id);
            $user->increment('persentance', 5);
        }

        $social = ModelsSocialMedia::create([
            'user_id' => Auth::user()->id,
            'icon' => $this->social,
            'link' => $this->link,
        ]);

        $this->resetInput();

        if ($social) {
            session()->flash('success', 'Social Media Added Successfully');
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
        ModelsSocialMedia::find($this->id)->delete();

        $id = Auth::user()->id;

        $social = ModelsSocialMedia::where('user_id', $id)->get();

        if (count($social) == 0) {
            $user = User::find($id);
            $user->decrement('persentance', 5);
        }

        $this->resetInput();

        session()->flash('success', 'Social Media Delete Successfully');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset(['id', 'social', 'link']);
    }

    public function render()
    {
        $data['social_medias'] = ModelsSocialMedia::where('user_id', Auth::user()->id)->get();

        return view('livewire.frontend.social-media', $data);
    }
}
