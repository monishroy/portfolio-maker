<?php

namespace App\Livewire\Frontend;

use App\Models\Education as ModelsEducation;
use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Education extends Component
{
    public $id;

    public $inputs = [['title' => '', 'institute_name' => '', 'start_year' => '', 'end_year' => '', 'description' => '']];

    public function add()
    {
        $this->inputs[] = ['title' => '', 'institute_name' => '', 'start_year' => '', 'end_year' => '', 'description' => ''];
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
                'inputs.*.title' => 'required',
                'inputs.*.institute_name' => 'required',
                'inputs.*.start_year' => 'required',
                'inputs.*.end_year' => 'required',
                'inputs.*.description' => 'required',
            ],
            [
                'inputs.*.title' => 'The :position title field is requerd',
                'inputs.*.institute_name' => 'The :position institute name field is requerd',
                'inputs.*.start_year' => 'The :position start year field is requerd',
                'inputs.*.end_year' => 'The :position end year field is requerd',
                'inputs.*.description' => 'The :position description field is requerd',
            ]
        );

        $id = Auth::user()->id;

        $education = ModelsEducation::where('user_id', $id)->get();

        if (count($education) == 0) {
            $user = User::find($id);
            $user->increment('persentance', 5);
        }

        foreach ($this->inputs as $item) {

            ModelsEducation::create([
                'user_id' => Auth::user()->id,
                'title' => $item['title'],
                'institute_name' => $item['institute_name'],
                'start_year' => $item['start_year'],
                'end_year' => $item['end_year'],
                'description' => $item['description'],
            ]);
        }

        session()->flash('success', 'Education Added Successfully');

        $this->inputs = [['title' => '', 'institute_name' => '', 'start_year' => '', 'end_year' => '', 'description' => '']];
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function distroy()
    {
        ModelsEducation::find($this->id)->delete();

        $id = Auth::user()->id;

        $education = ModelsEducation::where('user_id', $id)->get();

        if (count($education) == 0) {
            $user = User::find($id);
            $user->decrement('persentance', 5);
        }

        $this->resetInput();

        session()->flash('success', 'Education Delete Successfully');
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
        $data['educations'] = ModelsEducation::where('user_id', Auth::user()->id)->get();

        return view('livewire.frontend.education', $data);
    }
}
