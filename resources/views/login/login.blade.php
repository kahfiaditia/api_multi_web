
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login Akun</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        {{-- <link href="assets/css/app-rtl.min.css" rel="stylesheet" type="text/css" /> --}}
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="" class="logo logo-admin">
                                            <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Let's Get Started Dastyle</h4>   
                                        <p class="text-muted  mb-0">Sign in to continue to Dastyle.</p>  
                                    </div>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
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

                                            <form class="form-horizontal" action="{{ route ('login.proses') }}" method="POST" novalidate>
                                                @csrf
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <div class="input-group mb-3">                                                                                         
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                                                        <div class="invalid-feedback">
                                                            Silahkan Masukan kata Sandi dan kata Sandi harus terdiri dari 5
                                                            karakter
                                                            atau lebih!
                                                        </div>
                                                    </div>                                    
                                                </div> 
                    
                                                <div class="form-group">
                                                    <label for="userpassword">Password</label>                                            
                                                    <div class="input-group mb-3">                                  
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                                                        <div class="invalid-feedback">
                                                            Silahkan Masukan kata Sandi dan kata Sandi harus terdiri dari 5
                                                            karakter
                                                            atau lebih!
                                                        </div>
                                                    </div>                               
                                                </div>
                    
                                                <div class="form-group row mt-4">
                                                    <div class="col-sm-6">
                                                        <a href="#" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                                    </div> 
                                                </div>
                    
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12 mt-2">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                                                            Log In2 <i class="fas fa-sign-in-alt ml-1"></i>
                                                        </button>
                                                    </div> 
                                                </div>                          
                                            </form>
                                        </div>
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->

    
        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>

        
    </body>

</html>