{{-- Delete Modal  --}}
<div wire:ignore.self class="modal fade zoomIn" id="deleteModel" tabindex="-1" aria-hidden="true">
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
