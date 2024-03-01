<div>

    {{-- Delete Modal  --}}
    <div wire:ignore.self class="modal fade zoomIn" id="deleteModalLanguage" tabindex="-1" aria-hidden="true">
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
    <form wire:submit="store" class="d-flex justify-content-center">
        <div class="row mb-5">
            <div class="col-auto">
                <label class="visually-hidden" for="language">Language Name</label>
                <input type="text" wire:model.live="name" class="form-control @error('name') is-invalid @enderror" id="language" placeholder="Language Name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div><!--end col-->
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    <i wire:loading wire:target="store" class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                    Add
                </button>
            </div><!--end col-->
        </div><!--end row-->
    </form>
    <div class="row">
        @foreach ($languages as $language)
        <div class="col-3">
            <div class="bg-light rounded p-3 d-flex justify-content-between">
                <h6>{{ $language->name }}</h6>
                <button class="btn btn-sm btn-danger" wire:click="delete({{$language->id}})" data-bs-toggle="modal"  data-bs-target="#deleteModalLanguage"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                    <i class="bx bx-trash align-bottom"></i>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>