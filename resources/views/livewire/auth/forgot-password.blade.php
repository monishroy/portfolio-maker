<div>
    <div class="card-body p-4">
        <div class="text-center mt-2">
            <h5 class="text-primary">
                Forgot Password?
            </h5>
            <p class="text-muted">
                Reset password with pims
            </p>
            <lord-icon
                src="https://cdn.lordicon.com/rhvddzym.json"
                trigger="loop"
                colors="primary:#8c68cd"
                class="avatar-xl"
            ></lord-icon>
        </div>

        <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
            Enter your email and instructions will
            be sent to you!
        </div>
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <i class="dripicons-checkmark me-2"></i>
            {{Session::get('success')}}
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            <i class="dripicons-wrong me-2"></i>
            {{Session::get('error')}}
        </div>
        @endif
        <div class="p-2">
            <form wire:submit="forgot_password">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" wire:model.live="email" class="form-control @error('email') border-danger text-danger @enderror" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}"/>
                    <div class="invalid-feedback"> Please enter email.</div>
                    @error('email')
                    <span class="text-danger form-text"><small>{{$message}}</small></span>
                    @enderror
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary w-100" type="submit"><i wire:loading wire:target="forgot_password" class="mdi mdi-loading mdi-spin align-middle me-2"></i> Send Reset Link</button>
                </div>
            </form>
            <!-- end form -->
        </div>
        <div class="mt-4 text-center">
            <p class="mb-0">
                Wait, I remember my password...
                <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline">
                    Click here
                </a>
            </p>
        </div>
    </div>
</div>
