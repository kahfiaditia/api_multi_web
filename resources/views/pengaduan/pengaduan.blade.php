

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Pengaduan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body accountbg">

        <!-- Register page -->
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Laporkan Pengaduan</h4>   
                                        <p class="text-muted  mb-0">Silahkan Isi Pengaduan Anda.</p>  
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- <ul class="nav-border nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#Register_Tab" role="tab">Register</a>
                                        </li>
                                    </ul> --}}
                                     <!-- Tab panes -->
                                    <div class="tab-content">
                                        
                                        <div class="tab-pane active px-3 pt-3" id="Register_Tab" role="tabpanel">
                                            <form class="form-horizontal auth-form my-4" action="{{ route('adukan.store') }}" method="POST">
                                                @csrf
            
                                                <div class="form-group">
                                                    <label for="username">Nama Lengkap</label>
                                                    <div class="input-group mb-3">                   
                                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" autocomplete="off" autofocus required>
                                                    </div>                                    
                                                </div><!--end form-group--> 
            
                                                <div class="form-group">
                                                    <label for="useremail">Telepon</label>
                                                    <div class="input-group mb-3">                                                                                         
                                                        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukan Telepon" autocomplete="off" autofocus required>
                                                    </div>                                    
                                                </div><!--end form-group-->
                    
                                                 
            
                                                <div class="form-group">
                                                    <label for="conf_password">Pengaduan</label>                                            
                                                   <textarea id="pengaduan_editor" name="isi" placeholder="Masukkan Pengaduan" required></textarea>
                                                </div><!--end form-group-->
                                                
                                                
                                                <div class="form-group mb-0 row">
                                                    <div class="col-12 mt-2">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                                                            Ajukan Pengaduan <i class="fas fa-sign-in-alt ml-1"></i>
                                                        </button>
                                                    </div> 
                                                </div>                         
                                            </form>
                                            <!--end form-->
                                                                                        
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">Desa Pasirkecapi</span>                                            
                                </div>
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Register page -->

        


        <!-- jQuery  -->
        <script src="{{ asset('../plugins/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script>
                document.addEventListener("DOMContentLoaded", function () {
                    tinymce.init({
                        selector: '#pengaduan_editor',
                        height: 300,
                        setup: function (editor) {
                            // Sync content on submit
                            editor.on('change', function () {
                                editor.save();
                            });

                            // Ensure content is saved before form submission
                            document.querySelector('form').addEventListener('submit', function () {
                                editor.save();
                            });
                        }
                    });
                });
        </script>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/feather.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>

        <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
        <script type="text/javascript">
            $('.delete_confirm').on('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Hapus Data',
                    text: 'Ingin menghapus data?',
                    icon: 'question',
                    showCloseButton: true,
                    showCancelButton: true,
                    cancelButtonText: "Batal",
                    focusConfirm: false,
                }).then((value) => {
                    if (value.isConfirmed) {
                        // console.log('confirmed');
                        $(this).closest("form").submit()
                    }
                });
            });
        </script>
    </body>

</html>