<div>
    {{-- Delete Modal  --}}
    <div wire:ignore.self class="modal fade zoomIn" id="deleteModalProject" tabindex="-1" aria-hidden="true">
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
    <form wire:submit="store">
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
            <div class="col-6">
                <div class="mb-3">
                    <label for="firstNameinput" class="form-label">Project Name</label>
                    <input type="text" wire:model.live="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your firstname" id="firstNameinput">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div><!--end col-->
            <div class="col-6">
                <div class="mb-3">
                    <label for="image-input" class="form-label">Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" wire:model="image" type="file" accept="image/*">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    <span wire:loading wire:target="image">Uploading...</span>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <div wire:ignore>
                        <textarea id="editor" wire:model.debounce.1000ms="description"></textarea>
                    </div>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div><!--end col-->
            @error('image') 

            @else
            <div class="col-12 mb-3">
                @if ($image) 
                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid">
                @endif
            </div>
            @enderror
            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </form>
    <div class="row mt-4" wire:poll.2s>
        @foreach ($projects as $project)
        <div class="col-xxl-6">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">{{ $project->name }}</h5>
                            <div class="text-end">
                                <a href="javascript:void(0);" wire:click="delete({{$project->id}})" data-bs-toggle="modal" data-bs-target="#deleteModalProject" class="badge bg-danger-subtle text-danger fs-12"><i class="ri-delete-bin-6-line align-bottom me-1"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-2">{!! $project->description !!}</p>
                            <p class="card-text"><small class="text-muted">Last updated {{ $project->updated_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="rounded-end img-fluid h-100 object-fit-cover" src="{{ asset('storage/projects/'.$project->image) }}" alt="Card image">
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        @endforeach
    </div>
</div>
@push('js')
    <script src="{{ url('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- ckeditor -->
    {{-- <script src="{{ asset('backend/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush