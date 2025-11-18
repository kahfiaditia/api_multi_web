<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Dhasatra Money Transfer</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets2/img/logo/fav.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('assets2/img/logo/fav.png') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('assets2/css/styles.css') }}" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="{{ asset('assets2/css/colors.css') }}" rel="stylesheet">

</head>

<body class="red-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        @include('dhasatra.menu')
        <!-- End Navigation -->
        <div class="clearfix"></div>

    
        @yield('dhasatra')


        <!-- ============================ Footer Start ================================== -->
        @include('dhasatra.footer')
        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="registermodal">
                    <div class="position-absolute end-0 top-0 mt-3 me-3 z-1">
                        <span class="square--30 circle bg-light z-2" data-bs-dismiss="modal" aria-hidden="true"><i
                                class="bi bi-x"></i></span>
                    </div>
                    <div class="modal-body p-4">
                        <div class="login-card">

                            <div class="web-logo d-flex align-items-center justify-content-center mb-3">
                                <div class="logo"><img src="assets/img/logo-icon.png" class="img-fluid"
                                        width="60" alt="Logo"></div>
                            </div>

                            <div class="login-caps mb-3">
                                <div class="text-center">
                                    <h3 class="fw-semibold m-0">Welcome back</h3>
                                    <span>Please enter your details to sign in carefully.</span>
                                </div>
                            </div>

                            <div class="social-login-wrap mb-4">
                                <div class=" d-flex align-items-center justify-content-between gap-4">
                                    <a href="#" class="btn btn-outline-gray rounded-3 flex-fill"><i
                                            class="bi bi-apple"></i></a>
                                    <a href="#" class="btn btn-outline-gray rounded-3 flex-fill"><i
                                            class="bi bi-google text-red"></i></a>
                                    <a href="#" class="btn btn-outline-gray rounded-3 flex-fill"><i
                                            class="bi bi-twitter text-info"></i></a>
                                </div>
                            </div>

                            <div class="deider-wrap w-100 mt-3 mb-5">
                                <div class="d-block border-top position-relative">
                                    <span
                                        class="position-absolute top-50 start-50 translate-middle square--40 circle bg-white text-muted z-1">OR</span>
                                </div>
                            </div>

                            <div class="login-form">
                                <form>

                                    <div class="form-group mb-4">
                                        <input type="email" class="form-control" placeholder="Enter your email..">
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="********">
                                            <span class="position-absolute top-50 end-0 translate-middle-y me-3"><i
                                                    class="bi bi-eye text-muted"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input id="saveinfo" class="form-check-input" name="saveinfo"
                                                    type="checkbox">
                                                <label for="saveinfo" class="form-check-label">Remember me</label>
                                            </div>
                                            <div class="forget-password"><a href="#"
                                                    class="text-decoration-underline">Forgot Password?</a></div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="button" class="btn btn-main w-100">Sign In</button>
                                    </div>

                                    <div class="form-group">
                                        <div class="text-center text-muted">Don't have an account yet? <a
                                                href="#" data-bs-toggle="modal" data-bs-target="#signup"
                                                data-bs-dismiss="modal" class="fw-semibold">Sign Up</a></div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Sign Up Modal -->
        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="sign-up">
                    <div class="position-absolute end-0 top-0 mt-3 me-3 z-1">
                        <span class="square--30 circle bg-light z-2" data-bs-dismiss="modal" aria-hidden="true"><i
                                class="bi bi-x"></i></span>
                    </div>
                    <div class="modal-body p-4">
                        <div class="login-card">

                            <div class="web-logo d-flex align-items-center justify-content-center mb-3">
                                <div class="logo"><img src="assets/img/logo-icon.png" class="img-fluid"
                                        width="60" alt="Logo"></div>
                            </div>

                            <div class="login-caps mb-4">
                                <div class="text-center">
                                    <h2 class="fw-semibold m-0">Hi! Welcome to</h2>
                                    <h3 class="fw-semibold m-0">LearnUp Online Study Center</h3>
                                </div>
                            </div>

                            <div class="login-form">
                                <form>

                                    <div class="form-group mb-3">
                                        <div class="row g-3">
                                            <div class="form-group col-6"><input type="email" class="form-control"
                                                    placeholder="First Name"></div>
                                            <div class="form-group col-6"><input type="email" class="form-control"
                                                    placeholder="Last Name"></div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control" placeholder="Enter your email..">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="********">
                                            <span class="position-absolute top-50 end-0 translate-middle-y me-3"><i
                                                    class="bi bi-eye text-muted"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="button" class="btn btn-main w-100">Sign Up</button>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="text-center text-muted">Already have an account on LearnUp? <a
                                                href="#" data-bs-toggle="modal" data-bs-target="#login"
                                                data-bs-dismiss="modal" class="fw-semibold">Log In</a></div>
                                    </div>

                                    <div class="deider-wrap w-100 mt-4 mb-4">
                                        <div class="d-block border-top position-relative">
                                            <span
                                                class="position-absolute top-50 start-50 translate-middle square--40 circle bg-white text-muted z-1">OR</span>
                                        </div>
                                    </div>

                                    <div class="social-login-wrap">
                                        <div class=" d-flex align-items-center justify-content-between gap-4">
                                            <a href="#"
                                                class="btn btn-md btn-gray rounded-3 border-2 flex-fill">SignUp with<i
                                                    class="bi bi-apple ms-2"></i></a>
                                            <a href="#"
                                                class="btn btn-md btn-gray rounded-3 border-2 flex-fill">SignUp with<i
                                                    class="bi bi-google text-red ms-2"></i></a>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets2/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets2/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets2/js/slick.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

</body>

</html>
