<div>
    @include('livewire.modal')
    <div class="card">
        <div class="card-header border-bottom-dashed">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div class="col-xl-3">
                        <div class="col-sm">
                            <div class="d-flex">
                                <div class="search-box">
                                    <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search Roles...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <div class="ms-2">
                            <select class="form-select bg-light" wire:model.live="size" name="size">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        @can('add role')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i> Create Role</a>
                        @endcan
                        <button type="button" class="btn btn-secondary"><i class="ri-save-3-line align-bottom me-1"></i> Export</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover border">
                    <thead>
                        <tr>
                            <th >SL</th>
                            <th >Role Name</th>
                            <th >Permissions</th>
                            <th >Create Date</th>
                            <th >Update Date</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $key=>$role)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $role->name }}</td>
                            <td><span class="text-primary fs-4 cursor-pointer" data-bs-toggle="modal" data-bs-target="#permission-{{ $role->id }}"> <i class="bx bx-show"></i></span></td>
                            <td>{{ date('d M, Y', strtotime($role->created_at)) }}</td>
                            <td>
                                @if ($role->created_at == $role->updated_at)
                                    {{ 'N/A' }}
                                @else
                                    {{  date('d M, Y', strtotime($role->created_at)) }}
                                @endif
                            </td>
                            <td>
                                <div class="hstack gap-2">  
                                    @can('edit role')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-soft-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="ri-pencil-fill align-bottom"></i>
                                        </a>
                                    @endcan
                                    @can('delete role')
                                        <button class="btn btn-sm btn-soft-danger" wire:click="delete({{$role->id}})" data-bs-toggle="modal"  data-bs-target="#deleteModel"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="bx bx-trash align-bottom"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Default Modals -->
                        <div id="permission-{{ $role->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Permission</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                    </div>
                                    <hr>
                                    <div class="modal-body">
                                        <div class="row g-2">
                                            @foreach ($role->permissions as $item)
                                            <div class="col-4">
                                                <span class="badge bg-primary-subtle fs-6 text-primary badge-border">{{ $item->name }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No role found for matching "{{ $search }}".</h5>
                                    <p class="text-muted mb-0">We've searched more than {{ $total_role }}+ roles We did not find any roles for you search.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="">
                <div class="float-start mt-2">
                    <div class="dataTables_info">Showing 1 to {{ count($roles) }} of {{ $total_role }} entries</div>
                </div>
                <div class="float-end">
                    {{ $roles->links('vendor.livewire.bootstrap')}}
                </div>
            </div>
         </div>
    </div>
</div>
