<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- font awsome --}}
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css"
        integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Script -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
</head>

@if (Session::has('user'))

    <body class="hold-transition sidebar-mini layout-fixed mx-2">
        <div class="wrapper">
            @if (Session::has('user'))
                @include('partial.nav')
            @endif
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">RJ Mahaal Hotel</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    @if (Session::has('user') && Session::get('user')['user_type'] == 'admin')
                        @include('layouts.menu.admin')
                    @elseif(Session::has('user') && Session::get('user')['user_type'] == 'customer')
                        @include('layouts.menu.customer')
                    @endif

                </div>
                {{-- <!-- /.sidebar --> --}}
            </aside>

            <div class="content-wrapper">
                <div>
                    <p class="h1 bg-primary text-white text-center py-4">Hotel Management System- RJ Mahaal Hotel</p>
                </div>
                @yield('content')
            </div>

            <!-- AdminLTE App -->
            <script src="{{ asset('dist/js/adminlte.js') }}"></script>
            <script src="{{ asset('js/validation.js') }}"></script>
            <script>
                function toast() {
                    $.toast({
                        text: msg,
                        position: 'top-right',
                        loader: false,
                        bgColor: 'green'
                    });
                }
                @if (Session::has('msg'))
                    var msg = '{{ Session::get('msg') }}';
                    toast(msg);
                @endif
            </script>
        </div>
    </body>
@else

    <body>
        <div>
            <p class="h1 bg-primary text-white text-center py-4">Hotel Management System- RJ Mahaal Hotel</p>
        </div>
        @yield('content')
    </body>
@endif

</html>
