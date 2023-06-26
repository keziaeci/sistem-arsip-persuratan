<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SiapWolu</title>

    <!-- Custom fonts for this template-->
    <link
    href="{{ asset('/assets/css/fontawesome.min.css') }}"
    rel="stylesheet"
    type="text/css"
    />
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet"
    />
    {{-- icon --}}
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    
    {{-- bootstrap core --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}

    <!-- Custom styles for this template-->
    <link href="{{ asset('/assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    
    <!-- Bootstrap core JavaScript-->
    <script defer src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    {{-- <script defer src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script defer src="{{ asset('/assets/js/bootstrap.bundle.min2.js') }}"></script>
    
    <!-- Core plugin JavaScript-->
    <script defer src="{{ asset('/assets/js/jquery.easing.min.js') }}"></script>
    
    <!-- Custom scripts for all pages-->
    <script defer src="{{ asset('/assets/js/sb-admin-2.min.js') }}"></script>

    {{-- chart js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> --}}

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
    <!-- Sidebar -->
        @include('components.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->

    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->

        <div id="content">

        <!-- Topbar -->
        @include('components.topbar')
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                {{ $slot }}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer sticky-bottom bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>Copyright &copy; SiapWolu 2022</span>
            </div>
        </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fi fi-rr-arrow-small-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
    class="modal fade"
    id="logoutModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
            class="close"
            type="button"
            data-dismiss="modal"
            aria-label="Close"
            >
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
            <button
            class="btn btn-secondary"
            type="button"
            data-dismiss="modal"
            >
            Cancel
            </button>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('post')
            <button class="btn btn-primary" type="submit" href="{{ route('logout') }}">Logout</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    @yield('scripts')
    @stack('js')
</body>
</html>
