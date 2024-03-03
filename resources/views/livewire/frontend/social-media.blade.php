<div>

    {{-- Delete Modal  --}}
    <div wire:ignore.self class="modal fade zoomIn" id="deleteModalSocial" tabindex="-1" aria-hidden="true">
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
    <form wire:submit="store">
        <div class="row mb-5">
            <div class="col-md-4 mb-3">
                <label class="visually-hidden" for="social">Social Media</label>
                <select wire:model.live="social" class="form-control bg-light @error('social') is-invalid @enderror" id="social">
                    <option value="bx bxl-facebook-square">Facebook</option>
                    <option value="bx bxl-instagram-alt">Instagram</option>
                    <option value="bx bxl-linkedin-square">Linkedin</option>
                    <option value="bx bxl-twitter">Twitter</option>
                    <option value="bx bxl-github">Github</option>
                    <option value="bx bx-world">Website</option>
                    <option value="bx bxl-whatsapp">Whatsapp</option>
                    <option value="bx bxl-slack">Slack</option>
                    <option value="bx bxl-dribbble">Dribbble</option>
                </select>
                @error('social') <small class="text-danger">{{ $message }}</small> @enderror
            </div><!--end col-->
            <div class="col-md-7 mb-3">
                <label class="visually-hidden" for="link">Link</label>
                <input type="text" wire:model.live="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Social Link">
                @error('link') <small class="text-danger">{{ $message }}</small> @enderror
            </div><!--end col-->
            <div class="col-md-1 mb-3">
                <button type="submit" class="btn btn-primary">
                    <i wire:loading wire:target="store" class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                    Add
                </button>
            </div><!--end col-->
        </div><!--end row-->
    </form>
    <div> 
        
    </div>
    <div class="row">

        @foreach ($social_medias as $social)
        
        <ul class="list-group mb-3">
            <li class="list-group-item">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="d-flex">
                            <div class="flex-shrink-0 avatar-xs">
                                <div class="avatar-title bg-primary-subtle text-primary rounded">
                                    <i class="{{ $social->icon }}"></i>
                                </div>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <h6 class="fs-14 mb-0">{{ $social->link }}</h6>
                                <small class="text-muted">{{ $social->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <button class="btn btn-sm btn-danger" wire:click="delete({{$social->id}})" data-bs-toggle="modal"  data-bs-target="#deleteModalSocial"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                            <i class="bx bx-trash align-bottom"></i>
                        </button>
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
    </div>
</div>