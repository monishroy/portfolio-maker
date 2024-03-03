@extends('backend.layouts.main')

@section('title', 'Profile')
@push('css')
    <style>
        #iframe::-webkit-scrollbar {
        width: 5px;
        }

        #iframe::-webkit-scrollbar-track {
        background: #f1f1f1;
        }

        #iframe::-webkit-scrollbar-thumb {
        background: #979797;
        border-radius: 3px;
        }

        #iframe::-webkit-scrollbar-thumb:hover {
        background: #575757;
        }
    </style>
@endpush
@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{ route('frontend.dashboard') }}" class="btn btn-primary mb-3">Dashboard</a>
    </div>
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#basic-info" role="tab">
                            <i class="fas fa-home"></i>
                            Basic Info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab">
                            <i class="far fa-envelope"></i>
                            Experience
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#education" role="tab">
                            <i class="far fa-envelope"></i>
                            Education
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#gallery" role="tab">
                            <i class="far fa-envelope"></i>
                            Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#language" role="tab">
                            <i class="far fa-envelope"></i>
                            Languages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#project" role="tab">
                            <i class="far fa-envelope"></i>
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#social" role="tab">
                            <i class="far fa-envelope"></i>
                            Social
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab">
                            <i class="far fa-envelope"></i>
                            Privacy Policy
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="basic-info" role="tabpanel">

                        <livewire:frontend.basic-info>

                    </div>
                    <div class="tab-pane" id="experience" role="tabpanel">

                        <livewire:frontend.experience>

                    </div>
                    <div class="tab-pane" id="education" role="tabpanel">
                        
                        <livewire:frontend.education>

                    </div>
                    <div class="tab-pane" id="gallery" role="tabpanel">

                        <livewire:frontend.gallery>

                    </div>
                    <div class="tab-pane" id="language" role="tabpanel">

                        <livewire:frontend.language>

                    </div>
                    <div class="tab-pane" id="project" role="tabpanel">

                        <livewire:frontend.project>

                    </div>
                    <div class="tab-pane" id="social" role="tabpanel">

                        <livewire:frontend.social-media>

                    </div>
                    <div class="tab-pane" id="privacy" role="tabpanel">

                        <livewire:frontend.privacy>

                    </div>
                    <!--end tab-pane-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
    <div class="col-xxl-3">
        <!--end card-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-5">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Complete Your Profile</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="fs-5 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Min 80% complete profile then active your portfolio"><i class="ri-information-line align-bottom me-1"></i></a>
                    </div>
                </div>
                <div class="progress animated-progress custom-progress progress-label">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                        <div class="label">30%</div>
                    </div>
                </div>
                <button type="button" class="btn btn-soft-primary waves-effect waves-light mt-3 w-100">Active</button>
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>

@endsection
@push('js')
    <script src="{{ url('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- profile-setting init js -->
    <script src="{{ url('backend/assets/js/pages/profile-setting.init.js') }}"></script>
    <script>
        let getup = document.getElementById("getup");
        let timeNow = new Date().getHours();
        let greeting =
        timeNow >= 5 && timeNow < 12
            ? "Good Morning "
            : timeNow >= 12 && timeNow < 18
            ? "Good Afternoon"
            : "Good Evening";
        getup.innerHTML = `${greeting}`;
    </script>
@endpush                 
