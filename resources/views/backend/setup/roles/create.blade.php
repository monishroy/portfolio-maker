@extends('backend.layouts.main')

@section('title', 'Create Roles')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <h4 class="card-title mb-0 flex-grow-1">Create Role</h4>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary add-btn"><i class="ri-file-list-2-line align-bottom me-1"></i> Role List</a>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <form class="row needs-validation" action="{{ route('roles.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-3 mb-4">
                        <div class="sticky-side-div">
                            <label for="rolename" class="form-label">Role name</label>
                            <input type="text" class="form-control" name="role_name" id="rolename" placeholder="Role Name" value="{{ old('role_name') }}" required>
                            <div class="invalid-feedback">
                                Please enter role name.
                            </div>
                            @error('role_name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                            <div class="mt-3">
                                <button class="btn btn-primary w-100" type="submit">Role Create</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            @foreach ($groupedPermissions->chunk(1) as $chunks)
                            <div class="col-md-4">
                                <div class="card bg-light">
                                    @foreach ($chunks as $prefix => $permissions)
                                        <span class="p-3">
                                            <label class="fs-18 float-start" for="">{{ ucwords($prefix) }}</label>
                                            <label class="float-end fs-15" for="prefix-checkbox-{{ $prefix }}">Select All</label>
                                            <input type="checkbox" class="prefix-checkbox form-check-input mt-1 me-2 float-end" id="prefix-checkbox-{{$prefix }}" role="switch" data-prefix="{{ $prefix }}">
                                        </span>
                                        <ul>
                                        @foreach($permissions as $permission)
                                            <div>
                                                <input type="checkbox" name="permissions[]" id="permission-checkbox-{{ $permission->id }}" value="{{ $permission->id }}" class="form-check-input permission-checkbox">
                                                
                                                <label for="permission-checkbox-{{ $permission->id }}">&nbsp;&nbsp;{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>    
                    </div> 
                </form>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
@push('js')
    <!-- Masonry plugin -->
    <script src="{{ url('backend/assets/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
    <!-- validation init -->
    <script src="{{ url('backend/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ url('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.prefix-checkbox').on('click', function() {
                var prefix = $(this).data('prefix');
                var permissionCheckboxes = $(this).closest('span').next('ul').find('.permission-checkbox');
                var isChecked = $(this).prop('checked');

                permissionCheckboxes.prop('checked', isChecked);
            });

            $('.permission-checkbox').on('click', function() {
                var checkboxId = $(this).attr('id');
                var prefix = $(this).closest('ul').prev('span').find('.prefix-checkbox');
                var permissionCheckboxes = $(this).closest('ul').find('.permission-checkbox');
                var isAllChecked = permissionCheckboxes.length === permissionCheckboxes.filter(':checked').length;

                prefix.prop('checked', isAllChecked);
            });

            // Handle click event on text elements
            $('label[for^="permission-checkbox-"]').on('click', function() {
                var checkboxId = $(this).attr('for');
                $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
            });
            $('label[for^="permission-checkbox-"]').on('click', function() {
                var checkboxId = $(this).attr('for');
                $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
            });
        });
    </script>
@endpush