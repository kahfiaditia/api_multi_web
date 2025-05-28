

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{ $submenu }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- DataTables -->
        <link href="{{ asset('../plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('../plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('../plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
       
    </head>

    <body class="dark-sidenav">
       
        <div class="left-sidenav">
            <!-- LOGO -->
            @include('struktur.logo')
            <!--end logo-->

            <!-- Menu -->
            @include('struktur.menu')
            <!-- Menu End -->

        </div>
       
        

        <div class="page-wrapper">

            <!-- Top Bar Start -->
            @include('struktur.topbar')
            <!-- Top Bar End -->

            <!-- Page Content-->
            <div class="page-content">
                
                <div class="container-fluid">
                    @yield('isicontent')
                </div>
                @include('sweetalert::alert')
                @include('struktur.footer')

            </div>
             <!-- Page Content End-->
        </div>
              
        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/moment.js') }}"></script>
        <script src="{{ asset('../plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('../plugins/dropify/js/dropify.min.js') }}"></script>

        <script src="{{ asset('../plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('../plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('../plugins/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('assets/pages/jquery.form-upload.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script>
            $('#datatable').DataTable();
        </script>

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