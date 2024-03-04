<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-bs-theme="light" data-body-image="img-1" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose backend & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('backend/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ url('backend/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ url('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ url('backend/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden shadow-lg card-bg-fill border-0 card-border-effect-none">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="d-inline-block d-md-none"></div> 
                                    <div class="d-none d-md-inline-block justify-content-center" style="width: 100%; height: 100%">
                                        <div class="auth-one-bg h-100"></div>
                                    </div>
                                </div>
                                <!-- end col -->

                                @yield('content')

                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-body">
                                Copyright &copy; <script>document.write(new Date().getFullYear())</script> Portfolio. Development <i class="mdi mdi-heart text-danger"></i> by <a href="https://monishroy.com">Monish Roy</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>

    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ url('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.j') }}s"></script>
    <script src="{{ url('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ url('backend/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ url('backend/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ url('backend/assets/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ url('backend/assets/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ url('backend/assets/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ url('backend/assets/js/pages/password-addon.init.js') }}"></script>

    @stack('js')
</body>

</html>