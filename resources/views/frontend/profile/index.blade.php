@extends('backend.layouts.main')

@section('title', 'Profile')
@section('content')

<div class="row">
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
                    <!--end tab-pane-->
                    <div class="tab-pane" id="experience" role="tabpanel">

                        <livewire:frontend.experience>

                    </div>
                    <div class="tab-pane" id="education" role="tabpanel">
                        
                        <livewire:frontend.education>

                    </div>
                    <!--end tab-pane-->
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
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Social Media</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="badge bg-light text-secondary fs-12"><i class="ri-add-fill align-bottom me-1"></i> Add</a>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle fs-16 bg-primary-subtle text-primary">
                            <i class="ri-facebook-fill"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="dribbleName" placeholder="@monishroy010">
                </div>
                <div class="mb-3 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle fs-16 bg-info-subtle text-info">
                            <i class="ri-global-fill"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="websiteInput" placeholder="www.monishroy.com">
                </div>
                <div class="mb-3 d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle fs-16 bg-dark bg-opacity-25 text-dark">
                            <i class="ri-github-fill"></i>
                        </span>
                    </div>
                    <input type="email" class="form-control" id="gitUsername" placeholder="@monishroy">
                </div>
                <div class="d-flex">
                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                        <span class="avatar-title rounded-circle fs-16 bg-danger-subtle text-danger">
                            <i class="ri-instagram-fill"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="pinterestName" placeholder="@monishroy010">
                </div>
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
