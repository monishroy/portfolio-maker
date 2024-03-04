<?php

namespace App\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public function active()
    {
        $id = Auth::user()->id;

        User::find($id)->update([
            'temp_status' => '0',
        ]);

        return back();
    }

    public function deactive()
    {
        $id = Auth::user()->id;

        User::find($id)->update([
            'temp_status' => '1',
        ]);

        return back();
    }

    public function render()
    {
        return view('livewire.frontend.profile');
    }
}
