<?php

namespace App\Livewire\Frontend;

use App\Models\Template as ModelsTemplate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Template extends Component
{
    public $id, $name, $image, $description;

    public function view($id)
    {
        $template = ModelsTemplate::find($id);

        if (!empty($template)) {
            $this->id = $template->id;
            $this->name = $template->name;
            $this->description = $template->description;

            $image = getTemlateImage($template->id);
            $this->image = $image->name;
        }
    }

    public function set_template($id)
    {
        //Check auth and redirect to checkout page...
        if (Auth::check() == false) {
            if (!session()->has('template.id')) {
                session(['template.id' => $id]);
            }
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $data['templates'] = ModelsTemplate::all();

        return view('livewire.frontend.template', $data);
    }
}
