
<div>
    @include('livewire.modal')
    
    <div class="d-flex align-items-center mb-4">
        <div class="flex-grow-1">
            <h5 class="card-title mb-0">Job Experience</h5>
        </div>
        <div class="flex-shrink-0">
            <button type="button" wire:click="add" class="btn btn-sm btn-primary fs-12"><i class="ri-add-fill align-bottom me-1"></i> Add</button>
        </div>
    </div>
    <form wire:submit="store">
        @foreach ($inputs as $index => $item)
        <div class="row">
            <div class="col-12">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{Session::get('success')}} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> {{Session::get('error')}} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="jobTitle" class="form-label">Job Title</label>
                    <input type="text" wire:model="inputs.{{$index}}.job_title" class="form-control @error('inputs.'.$index.'.job_title') is-invalid @enderror" id="jobTitle" placeholder="Job title">
                    @error('inputs.'.$index.'.job_title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input type="text" wire:model="inputs.{{$index}}.company_name" class="form-control @error('inputs.'.$index.'.company_name') is-invalid @enderror" id="companyName" placeholder="Company name">
                    @error('inputs.'.$index.'.company_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="experienceYear" class="form-label">Experience Years</label>
                    <div class="row">
                        <div class="col-lg-5">
                            <select class="form-control bg-light @error('inputs.'.$index.'.start_year') is-invalid @enderror" wire:model="inputs.{{$index}}.start_year" id="experienceYear">
                                <option value="">Select Start Year</option>
                                @foreach ($years as $year)
                                <option {{ ($year->name == date('Y')-3) ? 'selected' : '' }} value="{{ $year->name }}">{{ $year->name }}</option>
                                @endforeach
                            </select>
                            @error('inputs.'.$index.'.start_year') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            to
                        </div>
                        <!--end col-->
                        <div class="col-lg-5">
                            <select class="form-control bg-light @error('inputs.'.$index.'.end_year') is-invalid @enderror" wire:model="inputs.{{$index}}.end_year" id="experienceYear">
                                <option value="">Select End Year</option>
                                @foreach ($years as $year)
                                <option value="{{ $year->name }}">{{ $year->name }}</option>
                                @endforeach
                                <option selected value="Present">Present</option>
                            </select>
                            @error('inputs.'.$index.'.end_year') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="jobDescription" class="form-label">Job Description</label>
                    <textarea class="form-control @error('inputs.'.$index.'.description') is-invalid @enderror" wire:model="inputs.{{$index}}.description" id="jobDescription" rows="3" placeholder="Enter description"></textarea>
                    @error('inputs.'.$index.'.description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
        </div>
        @if ($index != 0)
        <div class="align-items-end">
            <div class="text-end">
                <button type="button" wire:click="remove({{ $index }})" class="btn btn-sm btn-danger" ><i class="ri-subtract-fill align-bottom me-1"></i> Remove</button>
            </div>
        </div>
        @endif
        @endforeach
        @if(!empty($inputs))
        <div class="col-12">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        @endif
        <div class="row mt-4">
            @foreach ($experiences as $index=>$experience)
            <div class="col-md-6 mb-4">
                <div class="bg-light p-3 rounded">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">JOB NO : {{ ++$index }}</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" wire:click="delete({{$experience->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="badge bg-danger-subtle text-danger fs-12"><i class="ri-delete-bin-6-line align-bottom me-1"></i>Delete</a>
                        </div>
                    </div>
                    <dl class="row mb-0 mt-3">
                        <dt class="col-sm-4">Job Title</dt>
                        <dd class="col-sm-8">{{ $experience->job_title }}</dd>

                        <dt class="col-sm-4">Company Name</dt>
                        <dd class="col-sm-8">{{ $experience->company_name }}</dd>

                        <dt class="col-sm-4">Experience Years</dt>
                        <dd class="col-sm-8">{{ $experience->start_year.'-'.$experience->end_year }}</dd>

                        <dt class="col-sm-4 text-truncate">Job Description</dt>
                        <dd class="col-sm-8">{{ $experience->job_description }}</dd>
                    </dl>
                </div>
            </div>
            @endforeach
        </div>
    </form>
</div>
