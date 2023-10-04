<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('image/logo.png') }}">

    <title>Disperin | {{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="page-top">
    <div id="app">
        <!-- Page Wrapper -->
        <div id="wrapper">
            @if (!in_array($title, $route))
                <!-- ======= Sidebar ======= -->
                @include('layouts.sidebar')
                <!-- End Sidebar-->
            @endif
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content" class="bg-app-layout">
                    @if (!in_array($title, $route))
                        <!-- ======= Topbar ======= -->
                        @include('layouts.topbar')
                        <!-- End Topbar -->
                    @endif

                    {{ $slot }}

                </div>
                @if (!in_array($title, $route))
                    </main>

                    <!-- ======= Footer ======= -->
                    @include('layouts.footer')
                    <!-- End Footer -->
                @endif
            </div>

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>


            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
        </div>
    </div>
    @include('sweetalert::alert')
    @stack('scripts')
    <style>
        .bg-app-layout {
            background-image: url({{ asset('image/bg.jpg') }});
            height: 100%;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <script type="module">
        $('.btn-print').click(function() {
            $('.breadcumb').hide()
            $('.top-bar').hide()
            $('.sidebar').hide()
            $('.footer').hide()
            window.onafterprint = function(e) {
                $(window).off('mousemove', window.onafterprint);
                $('.breadcumb').show()
                $('.top-bar').show()
                $('.sidebar').show()
                $('.footer').show()
            };

            window.print();

            setTimeout(function() {
                $(window).one('mousemove', window.onafterprint);
            }, 1);

        })
    </script>
</body>

</html>
