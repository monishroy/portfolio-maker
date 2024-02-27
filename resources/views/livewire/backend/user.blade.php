<div>
    @include('livewire.modal')
    {{-- User Create Modals --}}
    <div wire:ignore.self id="create" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Create User</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form wire:submit="store" enctype="multipart/form-data">
                    <div class="modal-body">
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
                            <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First name</label>
                                <input type="text" wire:model.live="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="fname" placeholder="First Name">
                                @error('first_name')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last name</label>
                                <input type="text" wire:model.live="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="lname" placeholder="Last Name">
                                @error('last_name')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" wire:model.live="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                                @error('email')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">Role select</label>
                                <select wire:model.live="role" class="form-select bg-light @error('role') is-invalid @enderror" data-choices name="role" id="role">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status-field" class="form-label">Status</label>
                                <select wire:model.live="status" class="form-select bg-light @error('status') is-invalid @enderror" name="status" id="status-field">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                                @error('status')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input wire:model.live="password" type="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" id="password-input" name="password" value="{{ old('password') }}" placeholder="Enter password" aria-describedby="passwordInput">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        @error('password')
                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        <button type="submit" class="btn btn-primary ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- User Edit Modals --}}
    <div wire:ignore.self id="edit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Create User</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <form wire:submit="update" enctype="multipart/form-data">
                    <div class="modal-body">
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
                            <div class="col-md-6 mb-3">
                                <label for="fname" class="form-label">First name</label>
                                <input type="text" wire:model.live="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="fname" placeholder="First Name">
                                @error('first_name')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lname" class="form-label">Last name</label>
                                <input type="text" wire:model.live="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="lname" placeholder="Last Name">
                                @error('last_name')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" wire:model.live="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                                @error('email')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">Role select</label>
                                <select wire:model.live="role" class="form-select bg-light @error('role') is-invalid @enderror" data-choices name="role" id="role">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status-field" class="form-label">Status</label>
                                <select wire:model.live="status" class="form-select bg-light @error('status') is-invalid @enderror" name="status" id="status-field">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                                @error('status')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input wire:model.live="password" type="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" id="password-input" name="password" value="{{ old('password') }}" placeholder="Enter password" aria-describedby="passwordInput">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        @error('password')
                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        <button type="submit" class="btn btn-primary ">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header border-bottom-dashed">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div class="col-xl-3">
                        <div class="col-sm">
                            <div class="d-flex">
                                <div class="search-box">
                                    <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search Users...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        <div class="">
                            <select class="form-select text-uppercase bg-light" wire:model.live="role_id" name="role_id">
                                <option selected value="">All</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <select class="form-select bg-light" wire:model.live="size" name="size">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        @can('add user')
                            <button type="button" data-bs-toggle="modal" data-bs-target="#create" class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i> Create User</button>
                        @endcan
                        <button type="button" class="btn btn-secondary btn-label waves-effect waves-light"><i class="ri-save-3-line label-icon align-middle fs-16 me-2"></i> Export</button>
                    </div>
                </div>
            </div>
        </div>
        <div wire:poll.10s class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Provider</th>
                            <th>Role</th>
                            <th>Verify</th>
                            <th>Status</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key=>$user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                @if ($user->image == null)
                                <div class="d-flex align-items-center">
                                    <div style="padding: 1px" class="flex-shrink-0 border border-2
                                     @if ($user && $user->last_activity >= now()->subMinutes(1)) border-success @else @endif">
                                        <div class="avatar-xs">
                                            <div class="avatar-title  bg-primary text-white fs-15 bg-opacity-75">
                                                {{ Str::limit(ucwords($user->fname), 1, '') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex align-items-center">
                                    <div style="padding: 1px" class="flex-shrink-0 border border-2
                                    @if ($user && $user->last_activity >= now()->subMinutes(1)) border-success @else @endif">
                                        <img src="{{ $user->image }}" alt="user image" class="img-fluid avatar-xs">
                                    </div>
                                </div>
                                @endif
                            </td>
                            <td>{{ $user->fname.' '.$user->lname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->provider == null) ? 'N/A' : $user->provider }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-primary-subtle text-primary text-uppercase">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ($user->is_verified == "1")
                                    <span class="badge bg-success-subtle text-success text-uppercase">Verified</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger text-uppercase">Unverified</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->status == "1")
                                    <span class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger text-uppercase">Block</span>
                                @endif
                            </td>
                            <td>{{ date('d M, Y', strtotime($user->created_at)) }}</td>
                            <td>
                                <div class="hstack gap-2">     
                                    @can('edit user')
                                        <button class="btn btn-sm btn-soft-info" wire:click="edit({{ $user->id }})" data-bs-toggle="modal" data-bs-target="#edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="ri-pencil-fill align-bottom"></i>
                                        </button>
                                    @endcan
                                    @can('delete user')
                                        <button class="btn btn-sm btn-soft-danger" wire:click="delete({{$user->id}})" data-bs-toggle="modal"  data-bs-target="#deleteModel"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="bx bx-trash align-bottom"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No users found for matching "{{ $search }}".</h5>
                                    <p class="text-muted mb-0">We've searched more than {{ $total_user }}+ users We did not find any users for you search.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="">
                <div class="float-start mt-2">
                    <div class="dataTables_info">Showing 1 to {{ count($users) }} of {{ $total_user }} entries</div>
                </div>
                <div class="float-end">
                    {{ $users->links('vendor.livewire.bootstrap')}}
                </div>
            </div>
         </div>
    </div>
</div>
@push('js')
    <script src="{{ url('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
        @this.on('close-model', (event) => {
            $('#edit').modal('hide');
        });
        });
    </script>
    
@endpush
