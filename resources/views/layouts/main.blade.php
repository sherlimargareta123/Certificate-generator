<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
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
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/quill/dist/quill.core.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/dataTables.dateTime.min.css') }}" type="text/css">

    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/argon.css?v=1.1.0') }}" type="text/css">

    <!-- CSS for filter -->
    <style>
        thead input {
            width: 100%;
        }
    </style>

</head>

<body onload="startTime()">
    @include('sweetalert::alert')
    @include('nav.sidebar')
    <div class="main-content" id="panel">
        @include('nav.topnav')
        @yield('content')
    </div>
    <!-- Argon Scripts -->
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
    <script src="{{ asset('asset/js/vendor/dataTables.dateTime.min.js') }}"></script>
    <script src="{{ asset('asset/js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/nouislider/distribute/nouislider.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/sweetalert/sweetalert.all.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('asset/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('asset/js/demo.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('asset/vendor/DataTables/datatables.min.js') }}"></script>
    @yield('date-filter')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#myTable', function() {
                $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-secondary');
            }).DataTable({
                lengthChange: true,
                buttons: [{
                        extend: 'pdfHtml5',
                        orientation: 'potrait',
                        pageSize: 'LEGAL',
                        download: 'open',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible',
                        }
                    },
                    'copy'
                ],
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                orderCellsTop: true,
                fixedHeader: true,
            });

            table.buttons().container()
                .appendTo('#myTable_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script type="text/javascript">
        function visibility3() {
            var x = document.getElementById('create_password');
            if (x.type === 'password') {
                x.type = "text";
                $('#eyeShow').show();
                $('#eyeSlash').hide();
            } else {
                x.type = "password";
                $('#eyeShow').hide();
                $('#eyeSlash').show();
            }
        }
    </script>
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>
</body>

</html>
