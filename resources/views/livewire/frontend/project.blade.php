<div>
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
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $project->name }}</h5>
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