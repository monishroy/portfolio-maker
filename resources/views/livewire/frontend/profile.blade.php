<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mb-5">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-0">Complete Your Profile</h5>
                </div>
                <div class="flex-shrink-0">
                    <a href="javascript:void(0);" class="fs-5 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Min 80% complete profile then active your portfolio"><i class="ri-information-line align-bottom me-1"></i></a>
                </div>
            </div>
            <div class="progress animated-progress custom-progress progress-label" wire:poll.300ms>
                <div class="progress-bar @if(Auth::user()->persentance <= 49) bg-warning @elseif(Auth::user()->persentance <= 79) bg-primary @else bg-success @endif" role="progressbar" style="width: {{ Auth::user()->persentance }}%" aria-valuenow="{{ Auth::user()->persentance }}" aria-valuemin="0" aria-valuemax="100">
                    <div class="label @if(Auth::user()->persentance <= 49) bg-warning @elseif(Auth::user()->persentance <= 79) bg-primary @else bg-success @endif">{{ Auth::user()->persentance }}%</div>
                </div>
            </div>
            @if (Auth::user()->temp_status == 1)
            <button type="button" wire:click="active" class="btn btn-success waves-effect waves-light mt-3 w-100" {{ (Auth::user()->persentance >= 80) ? '' : 'disabled' }}>Active</button>
            @else
            <button type="button" wire:click="deactive" class="btn btn-danger waves-effect waves-light mt-3 w-100">Dective</button>
            @endif
        </div>
    </div>
</div>
