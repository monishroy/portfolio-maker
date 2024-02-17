@extends('auth.layouts.main')

@section('title', 'Change Password')
@section('content')

<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <h5 class="text-primary">Create new password</h5>
        <p class="text-muted">Your new password must be different from previous used password.</p>

        <div class="p-2">
            <form action="{{ route('changePasswordPost') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="varify_token" value="{{ $token }}">
                <div class="mb-3">
                    <label class="form-label" for="password-input">Password</label>
                    <div class="position-relative auth-pass-inputgroup">
                        <input type="password" wire:model.live="password" class="form-control pe-5 password-input @error('new_password') border-danger @enderror" name="new_password" placeholder="Enter password" id="password-input" value="{{ old('new_password') }}">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                    </div>
                    @error('new_password')
                    <span class="text-danger form-text"><small>{{$message}}</small></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="confirm-password">Confirm Password</label>
                    <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="password" wire:model.live="password" class="form-control pe-5 password-input @error('re_new_password') border-danger @enderror" name="re_new_password" placeholder="Enter password" id="password-input" value="{{ old('re_new_password') }}">
                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        @error('re_new_password')
                        <span class="text-danger form-text"><small>{{$message}}</small></span>
                        @enderror
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check"/>
                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary w-100" type="submit">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-5 text-center">
            <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
        </div>
    </div>
</div>
<!-- end col -->
        
@endsection
