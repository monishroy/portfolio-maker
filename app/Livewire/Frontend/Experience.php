<?php

namespace App\Livewire\Frontend;

use App\Models\Experience as ModelsExperience;
use App\Models\Year;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Experience extends Component
{
    public $id;

    public $inputs = [['job_title' => '', 'company_name' => '', 'start_year' => '', 'end_year' => '', 'description' => '']];

    public function add()
    {
        $this->inputs[] = ['job_title' => '', 'company_name' => '', 'start_year' => '', 'end_year' => '', 'description' => ''];
    }

    public function remove($index)
    {
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs); // Re-index the array
    }

    public function store()
    {
        $this->validate(
            [
                'inputs.*.job_title' => 'required',
                'inputs.*.company_name' => 'required',
                'inputs.*.start_year' => 'required',
                'inputs.*.end_year' => 'required',
                'inputs.*.description' => 'required',
            ],
            [
                'inputs.*.job_title' => 'The :position job title field is requerd',
                'inputs.*.company_name' => 'The :position company name field is requerd',
                'inputs.*.start_year' => 'The :position start year field is requerd',
                'inputs.*.end_year' => 'The :position end year field is requerd',
                'inputs.*.description' => 'The :position description field is requerd',
            ]
        );

        foreach ($this->inputs as $item) {

            ModelsExperience::create([
                'user_id' => Auth::user()->id,
                'job_title' => $item['job_title'],
                'company_name' => $item['company_name'],
                'start_year' => $item['start_year'],
                'end_year' => $item['end_year'],
                'job_description' => $item['description'],
            ]);
        }

        session()->flash('success', 'Experience Added Successfully');

        $this->inputs = [['job_title' => '', 'company_name' => '', 'start_year' => '', 'end_year' => '', 'description' => '']];
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function distroy()
    {
        $user = ModelsExperience::find($this->id)->delete();

        $this->resetInput();

        session()->flash('success', 'Experience Delete Successfully');
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
        $data['years'] = Year::all();
        $data['experiences'] = ModelsExperience::where('user_id', Auth::user()->id)->get();

        return view('livewire.frontend.experience', $data);
    }
}
