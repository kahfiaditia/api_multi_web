<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="assets/images/logo-dark.png" height="30" class="logo-dark mx-auto"
                                    alt="">
                                <img src="assets/images/logo-light.png" height="30" class="logo-light mx-auto"
                                    alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>
                    @if (count($errors) > 0)
                        <div class="p-2">
                            <div class="alert alert-danger" role="alert">
                                Login Fail!
                            </div>
                        </div>
                    @endif
                    @if (session()->has('Error'))
                        <div class="p-2">
                            <div class="alert alert-danger" role="alert">
                                Verifikasi Fail!
                            </div>
                        </div>
                    @endif
                    @if (session()->has('loginError'))
                        <div class="p-2">
                            <div class="alert alert-danger" role="alert">
                                {{ session('loginError') }}
                            </div>
                        </div>
                    @endif
                    @if (session()->has('registerSucces'))
                        <div class="p-2">
                            <div class="alert alert-success" role="alert">
                                Register Succes!
                            </div>
                        </div>
                    @endif
                    <div class="p-3">
                        <form class="form-horizontal mt-3" action="{{ route('login.proses') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="email" name="email" id="email" required=""
                                        placeholder="Masukan Email">
                                    <div class="invalid-feedback">
                                        Silahkan Masukan Email dan Password harus terdiri dari 5
                                        karakter
                                        atau lebih!
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="Masukan Password">
                                    <div class="invalid-feedback">
                                        Silahkan Masukan Email dan Password harus terdiri dari 5
                                        karakter
                                        atau lebih!
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log
                                        In</button>
                                </div>
                            </div>

                            <div class="form-group mb-0 row mt-2">
                                <div class="col-sm-7 mt-3">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot
                                        your password?</a>
                                </div>
                                <div class="col-sm-5 mt-3">
                                    <a href="auth-register.html" class="text-muted"><i
                                            class="mdi mdi-account-circle"></i> Create an account</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
