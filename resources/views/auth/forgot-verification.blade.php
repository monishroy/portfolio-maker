@extends('auth.layouts.main')

@section('title', 'Forgot Password Varification')
@section('content')

<div class="col-lg-6">
    <div class="p-lg-5 p-4">
        <div class="mb-4">
            <div class="avatar-lg mx-auto">
                <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                    <i class="ri-mail-line"></i>
                </div>
            </div>
        </div>
        <div class="text-muted text-center mx-lg-3">
            <h4 class="">Verify Your Email</h4>
            <p>Please enter the 4 digit code sent to <span class="fw-semibold">{{ $email }}</span></p>
        </div>

        <div class="p-2 mt-4">
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
            <form autocomplete="off" action="{{ route('forgotPasswordVerify') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="row">
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit1-input" class="visually-hidden">Digit 1</label>
                            <input type="text" name="otp[]" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(1, event)" maxLength="1" id="digit1-input">
                        </div>
                    </div><!-- end col -->
            
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit2-input" class="visually-hidden">Digit 2</label>
                            <input type="text" name="otp[]" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(2, event)" maxLength="1" id="digit2-input">
                        </div>
                    </div><!-- end col -->
            
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit3-input" class="visually-hidden">Digit 3</label>
                            <input type="text" name="otp[]" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(3, event)" maxLength="1" id="digit3-input">
                        </div>
                    </div><!-- end col -->
            
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="digit4-input" class="visually-hidden">Digit 4</label>
                            <input type="text" name="otp[]" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(4, event)" maxLength="1" id="digit4-input">
                        </div>
                    </div><!-- end col -->
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">Confirm</button>
                </div>
            </form><!-- end form -->

        </div>

        <div class="mt-4 text-center">
            <div id="countdown"></div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <!-- two-step-verification js -->
    <script src="{{ url('backend/assets/js/pages/two-step-verification.init.js') }}"></script>
    <script src="{{ url('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Check if countdown value is stored in local storage
            var countdownValue = localStorage.getItem('countdownValue');

            if (countdownValue) {
                startCountdown(parseInt(countdownValue, 10));
            } else {
                // Start with a default countdown time (e.g., 60 seconds)
                startCountdown(90);
            }

            $('#resendBtn').on('click', function() {
                // Reset the countdown to the initial value (e.g., 60 seconds)
                startCountdown(90);
            });

            function startCountdown(seconds) {
                var countdown = seconds;
                updateCountdown();

                var countdownInterval = setInterval(function() {
                    countdown--;
                    updateCountdown();

                    if (countdown <= 0) {
                        $('#countdown').html("Didn't receive a code ? <a class='text-primary' id='resendBtn' href='{{ route('forgotPasswordSendMail',['id'=>$id]) }}'>Resend</a>");
                        // Countdown reached zero, clear interval and remove countdown value from local storage
                        clearInterval(countdownInterval);
                        localStorage.removeItem('countdownValue');
                    }
                }, 1000);

                function updateCountdown() {
                    var minutes = Math.floor(countdown / 60);
                    var seconds = countdown % 60;
                    $('#countdown').text('Resend in ' + minutes + ':' + seconds + ' seconds');
                    // Store the current countdown value in local storage
                    localStorage.setItem('countdownValue', countdown);
                }
            }
        });
    </script>
@endpush