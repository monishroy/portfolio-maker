
<div>
    {{-- Delete Modal  --}}
    <div wire:ignore.self class="modal fade zoomIn" id="deleteModalEdu" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="deleteRecord-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record ?</p>
                        </div>
                    </div>
                    <form wire:submit.prevent="distroy">
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger" id="delete-record" data-bs-dismiss="modal">Yes, Delete It!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex align-items-center mb-4">
        <div class="flex-grow-1">
            <h5 class="card-title mb-0">Education Qualification</h5>
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
                    <label for="Title" class="form-label">Title</label>
                    <input type="text" wire:model="inputs.{{$index}}.title" class="form-control" id="Title" placeholder="Title">
                    @error('inputs.'.$index.'.title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="instituteName" class="form-label">Institute Name</label>
                    <input type="text" wire:model="inputs.{{$index}}.institute_name" class="form-control" id="instituteName" placeholder="Institute name">
                    @error('inputs.'.$index.'.institute_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="experienceYear" class="form-label">Years</label>
                    <div class="row">
                        <div class="col-lg-5">
                            <select class="form-control bg-light" wire:model="inputs.{{$index}}.start_year" id="experienceYear">
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
                            <select class="form-control bg-light" wire:model="inputs.{{$index}}.end_year" id="experienceYear">
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
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" wire:model="inputs.{{$index}}.description" id="description" rows="3" placeholder="Enter description"></textarea>
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
            @foreach ($educations as $index=>$education)
            <div class="col-md-6 mb-4">
                <div class="bg-light p-3 rounded">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Education No : {{ ++$index }}</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" wire:click="delete({{$education->id}})" data-bs-toggle="modal" data-bs-target="#deleteModalEdu" class="badge bg-danger-subtle text-danger fs-12"><i class="ri-delete-bin-6-line align-bottom me-1"></i>Delete</a>
                        </div>
                    </div>
                    <dl class="row mb-0 mt-3">
                        <dt class="col-sm-4">Job Title</dt>
                        <dd class="col-sm-8">{{ $education->title }}</dd>

                        <dt class="col-sm-4">Institute Name</dt>
                        <dd class="col-sm-8">{{ $education->institute_name }}</dd>

                        <dt class="col-sm-4">Years</dt>
                        <dd class="col-sm-8">{{ $education->start_year.'-'.$education->end_year }}</dd>

                        <dt class="col-sm-4 text-truncate">Job Description</dt>
                        <dd class="col-sm-8">{{ $education->description }}</dd>
                    </dl>
                </div>
            </div>
            @endforeach
        </div>
    </form>
</div>
