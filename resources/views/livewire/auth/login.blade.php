<div>
    <div class="p-lg-5 p-4">
        <div class="text-center">
            <div class="d-flex justify-content-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('backend/assets/images/logo-dark.png') }}" class="" alt="logo dark" height="30">
                </a>
            </div>
        </div>
        <div class="p-2 mt-4">
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
            <form wire:submit="login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" wire:model.live="email" class="form-control @error('email') border-danger text-danger @enderror" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="float-end">
                        <a href="{{ route('forgotPassword') }}" class="text-muted">Forgot password?</a>
                    </div>
                    <label class="form-label" for="password-input">Password</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="password" wire:model.live="password" class="form-control pe-5 password-input @error('password') border-danger text-danger @enderror" name="password" placeholder="Enter password" id="password-input" value="{{ old('password') }}">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        @error('password')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" wire:model="remember" name="remember" type="checkbox" id="auth-remember-check">
                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100" type="submit">
                        <i wire:loading wire:target="login" class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                        Sign In
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <div class="signin-other-title">
                        <h5 class="fs-13 mb-4 title">Sign In with</h5>
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
            <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
        </div>
    </div>
</div>
