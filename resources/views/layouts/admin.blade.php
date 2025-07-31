<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'):Admin POS</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{ asset('plugins/jquery-asColorPicker-master/css/asColorPicker.css') }}" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="{{ asset('js/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('style')
</head>

<body>
    <div id="main-wrapper show">
        @include('layouts.partials.nav')
        @include('layouts.partials.header')
        @include('layouts.partials.aside')
        <div class="content-body">
            <div class="container-fluid mt-3">
                @yield('content')
            </div>
        </div>
        {{-- @include('layouts.partials.footer') --}}
    </div>
    <script src="{{ asset('plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>

    <!-- Chartjs -->
    <script src="{{ asset('plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    {{-- <script src="{{ asset('plugins/d3v3/index.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/topojson/topojson.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/datamaps/datamaps.world.min.js') }}"></script> --}}
    <!-- Morrisjs -->
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    {{-- <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script> --}}
    <!-- Clock Plugin JavaScript -->
    <script src="{{ asset('plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>
    <script src="{{ asset('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>
    <script src="{{ asset('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('js/plugins-init/form-pickers-init.js') }}"></script>
    <script src="{{ asset('vendor/jsvalidation/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <script>
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if (token) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": token.content,
                },
            });
        } else {
            console.error("CSRF Token not found.");
        }
    </script>
    @yield('script')
</body>

</html>
