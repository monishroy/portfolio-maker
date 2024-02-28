<div>
    <form wire:submit="update">
        <div class="row g-2">
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
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="old-password">Old Password*</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="password" wire:model.live="old_password" class="form-control pe-5 password-input @error('old_password') is-invalid @enderror" name="re_new_password" placeholder="Enter password" id="password-input">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        @error('old_password')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="password-input">New Password</label>
                    <div class="position-relative auth-pass-inputgroup">
                        <input type="password" wire:model.live="new_password" class="form-control pe-5 password-input @error('new_password') is-invalid @enderror" name="new_password" placeholder="Enter password" id="password-input">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                    </div>
                    @error('new_password')<small class="text-danger">{{$message}}</small>@enderror
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="password" wire:model.live="confirm_password" class="form-control pe-5 password-input @error('confirm_password') is-invalid @enderror" name="re_new_password" placeholder="Enter password" id="password-input">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        @error('confirm_password')<small class="text-danger">{{$message}}</small>@enderror
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-12">
                <div class="mb-3">
                    <a href="{{ route('forgotPassword') }}" class="link-primary text-decoration-underline">Forgot Password ?</a>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </form>
</div>
@push('js')
    
    <!-- password-addon init -->
    <script src="{{ url('backend/assets/js/pages/password-addon.init.js') }}"></script>
@endpush
