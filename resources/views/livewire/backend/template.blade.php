<div>
    @include('livewire.modal')
    <div class="row">
        @foreach ($templates as $template)
        <div class="col-xxl-4 col-lg-6">
            @php
                $template_image = getTemlateImage($template->id);
            @endphp
            <div class="card card-overlay">
                <img class="card-img img-fluid" src="{{ asset('storage/templates/'.$template_image->name) }}" alt="Template">
                <div class="card-img-overlay p-0" style="top:auto;">
                    <div class="card-footer bg-dark bg-opacity-50 d-flex justify-content-between">
                        <h4 class="card-title text-white mt-1">{{ Str::limit($template->name, 35, '...') }}</h4>
                        <div class="text-end">
                            <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-sm btn-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="ri-pencil-fill align-bottom"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" wire:click="delete({{ $template->id }})" data-bs-toggle="modal"  data-bs-target="#deleteModal"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                <i class="bx bx-trash "></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
