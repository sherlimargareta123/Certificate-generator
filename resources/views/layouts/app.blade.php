<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APJII Certificate Generator</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('asset/img/brand/logo-apjii-jatim-full.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('asset/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/argon.css?v=1.1.0') }}" type="text/css">
</head>

<body class="bg-default">
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route('login') }}">
                                <img src="">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <hr class="d-lg-none" />
                <ul class="navbar-nav align-items-lg-center ml-lg-auto"></ul>
            </div>
        </div>
    </nav>
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Core -->
    <script src="{{ asset('asset/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('asset/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('asset/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ asset('asset/vendor/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('asset/js/vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('asset/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="js/demo.min.js')}}"></script>
</body>

</html>
