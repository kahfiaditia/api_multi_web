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

    <style>
        :root {
            --primary-color: #5b73e8;
            --secondary-color: #9b59b6;
            --success-color: #34c38f;
            --danger-color: #f46a6a;
            --warning-color: #f1b44c;
            --info-color: #50a5f1;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 420px;
            width: 100%;
            animation: fadeIn 0.8s ease-out;
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px 20px;
            text-align: center;
        }

        .login-logo {
            display: inline-block;
            margin-bottom: 15px;
        }

        .login-logo img {
            height: 40px;
        }

        .login-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .login-subtitle {
            font-size: 14px;
            opacity: 0.9;
        }

        .login-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--dark-color);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e1e5eb;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(91, 115, 232, 0.2);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(91, 115, 232, 0.4);
        }

        .login-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s;
        }

        .login-footer a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        .alert {
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: rgba(244, 106, 106, 0.1);
            border: 1px solid rgba(244, 106, 106, 0.2);
            color: var(--danger-color);
        }

        .alert-success {
            background-color: rgba(52, 195, 143, 0.1);
            border: 1px solid rgba(52, 195, 143, 0.2);
            color: var(--success-color);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 576px) {
            .login-footer {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            body {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                {{-- <div class="login-logo">
                    <a href="#">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="Logo">
                    </a>
                </div> --}}
                <h1 class="login-title">Welcome Back</h1>
                <p class="login-subtitle">Sign in to continue to your dashboard</p>
            </div>

            <div class="login-body">
                <!-- Alert Messages -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <strong>Login Failed!</strong> Please check your credentials and try again.
                    </div>
                @endif

                @if (session()->has('Error'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Verification Failed!</strong> Please try again.
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('loginError') }}
                    </div>
                @endif

                @if (session()->has('registerSucces'))
                    <div class="alert alert-success" role="alert">
                        <strong>Registration Successful!</strong> You can now sign in with your credentials.
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-login">Sign In</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        // Add some interactive effects
        $(document).ready(function() {
            // Add focus effect to form inputs
            $('.form-control').on('focus', function() {
                $(this).parent().addClass('focused');
            });

            $('.form-control').on('blur', function() {
                if ($(this).val() === '') {
                    $(this).parent().removeClass('focused');
                }
            });

            // Add loading state to login button
            $('form').on('submit', function() {
                var btn = $(this).find('.btn-login');
                btn.html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Signing In...');
                btn.prop('disabled', true);
            });
        });
    </script>
</body>

</html>
