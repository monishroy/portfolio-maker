<?php

namespace App\Livewire\Frontend;

use App\Models\Template;
use App\Models\TemplateImage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $id, $name, $images, $description;


    public function view($id)
    {
        $template = Template::find($id);

        if ($template != null) {
            $this->id = $template->id;
            $this->images = TemplateImage::where('template_id', $id)->get();
            $this->name = $template->name;
            $this->description = $template->description;
        }
    }

    public function set_template($id)
    {
        $user_id = Auth::user()->id;

        User::find($user_id)->update([
            'template_id' => $id,
        ]);

        return redirect()->route('frontend.profile');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->reset(['id', 'name', 'images', 'description']);
    }

    public function render()
    {
        $data['templates'] = Template::all();

        $user = Auth::user();

        $date = date('Y-m-d');

        $data['views'] = $user->views;
        $data['today_views'] = User::where('updated_at', 'like', "%{$date}%")->where('id', $user->id)->get()->sum('views');

        return view('livewire.frontend.dashboard', $data);
    }
}
