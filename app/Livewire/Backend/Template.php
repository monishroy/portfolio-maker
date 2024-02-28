<?php

namespace App\Livewire\Backend;

use App\Models\Template as ModelsTemplate;
use App\Models\TemplateImage;
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
        $template = ModelsTemplate::find($this->id);

        $template_images = TemplateImage::where('template_id', $this->id)->get();

        if (!empty($template_images)) {
            foreach ($template_images as $template_image) {

                $image = storage_path('app/public/templates/' . $template_image->name);
                if (is_file($image)) {
                    unlink($image);
                }

                $image2 = storage_path('app/public/templates/orginal/' . $template_image->name);
                if (is_file($image2)) {
                    unlink($image2);
                }
            }
        }

        $template->delete();

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
