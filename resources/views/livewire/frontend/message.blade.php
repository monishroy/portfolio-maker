<div>
    @include('livewire.modal ')
    <div class="card">
        <div class="card-header border-bottom-dashed">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div class="col-xl-3">
                        <div class="col-sm">
                            <div class="d-flex">
                                <div class="search-box">
                                    <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search Message...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <div class="">
                            <select class="form-select bg-light text-uppercase" wire:model.live="status" name="status">
                                <option value="">All</option>
                                <option selected value="0">Pending</option>
                                <option value="1">Done</option>
                                <option value="2">Decline</option>
                            </select>
                        </div>
                        <div class="">
                            <select class="form-select bg-light" wire:model.live="size" name="size">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover table-bordered">
                    <thead>
                        <tr>
                            <th >SL</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Message</th>
                            <th >status</th>
                            <th >Received At</th>
                            <th >Reply At</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $key=>$message)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td >{{ $message->message }}</td>
                            <td>
                                @if ($message->status == "1")
                                    <span class="badge bg-success-subtle text-success text-uppercase">Done</span>
                                @elseif ($message->status == "0")
                                    <span class="badge bg-warning-subtle text-warning text-uppercase">Pending</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger text-uppercase">Decline</span>
                                @endif
                            </td>
                            <td>{{ date('d M, Y h:i A', strtotime($message->created_at)) }}</td>
                            <td>{{ $message->created_at == $message->updated_at ? "N/A" : date('d M, Y h:i A', strtotime($message->updated_at)) }}</td>
                            <td>
                                <div class="hstack gap-2">
                                    <button class="btn btn-sm btn-soft-danger" wire:click="delete({{$message->id}})" data-bs-toggle="modal"  data-bs-target="#deleteModal"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="ri-delete-bin-6-line align-bottom"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No message found for matching "{{ $search }}".</h5>
                                    <p class="text-muted mb-0">We've searched more than {{ $total_messages }}+ messages We did not find any messages for you search.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="">
                <div class="float-start mt-2">
                    <div class="dataTables_info">Showing 1 to {{ count($messages) }} of {{ $total_messages }} entries</div>
                </div>
                <div class="float-end">
                    {{ $messages->links('vendor.livewire.bootstrap')}}
                </div>
            </div>
        </div>
    </div>
</div>
