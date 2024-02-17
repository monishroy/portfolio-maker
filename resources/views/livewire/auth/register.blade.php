
<div class="p-lg-5 p-4">
    <div class="text-center mb-3">
        <div class="d-flex justify-content-center">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('backend/assets/images/logo-dark.png') }}" class="" alt="logo dark" height="30">
            </a>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{session('success')}} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{Session::get('error')}} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="p-2 mt-4">
        <form wire:submit="register">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('first_name') border-danger text-danger @enderror" wire:model.live="first_name" name="first_name" id="first_name" placeholder="Enter first name" value="{{ old('first_name') }}" >
                    <div class="invalid-feedback">
                        Please enter first name
                    </div>
                    @error('first_name')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('last_name') border-danger text-danger @enderror" wire:model.live="last_name" name="last_name" id="last_name" placeholder="Enter last name" value="{{ old('last_name') }}" >
                    <div class="invalid-feedback">
                        Please enter last name
                    </div>
                    @error('last_name')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') border-danger text-danger @enderror" wire:model.live="email" name="email" id="email" placeholder="Enter email address" value="{{ old('email') }}" >
                <div class="invalid-feedback">
                    Please enter email
                </div>
                @error('email')
                    <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('phone') border-danger text-danger @enderror" wire:model.live="phone" name="phone" id="phone" placeholder="Enter phone" value="{{ old('phone') }}" >
                <div class="invalid-feedback">
                    Please enter phone
                </div>
                @error('phone')
                    <span class="text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="password-input">Password</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" wire:model.live="password" class="form-control pe-5 password-input @error('password') border-danger @enderror" name="password" placeholder="Enter password" id="password-input" value="{{ old('password') }}">
                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                    @error('password')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary w-100" type="submit"><i wire:loading wire:target="register" class="mdi mdi-loading mdi-spin align-middle me-2"></i>Sign Up</button>
            </div>

            <div class="mt-4 text-center">
                <div class="signin-other-title">
                    <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                </div>
                <div>
                    <a href="auth/facebook/redirect"><button type="button" class="btn btn-soft-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button></a>
                    <a href="auth/google/redirect"><button type="button" class="btn btn-soft-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button></a>
                    <a href="auth/github/redirect"><button type="button" class="btn btn-soft-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button></a>
                    {{-- <a href="auth/twitter/redirect"><button type="button" class="btn btn-soft-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button></a> --}}
                </div>
            </div>
        </form>
    </div>

    <div class="mt-5 text-center">
        <p class="mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin</a> </p>
    </div>
</div>
