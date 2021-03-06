<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title>@yield('title')</title>


    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/favicon.ico">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ asset('back/vendor/open-iconic/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('back/vendor/flatpickr/flatpickr.min.css') }}"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('back/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset('back/stylesheets/theme-dark.min.css') }}" data-skin="dark">
    <link rel="stylesheet" href="{{ asset('back/stylesheets/custom.css') }}"><!-- Disable unused skin immediately -->
    <link rel="stylesheet" href="{{ asset('back/stylesheets/tagsinput.css') }}"><!-- Disable unused skin immediately -->
    <style>
        .table-input{
            border:none;
            padding: 0.75rem;
            display: block;
            position: relative;
            width: 100%;

        }
        .table-input::after{
            content: '';
            width: 100%;
            position: absolute;
            border-bottom: 1px solid #cccccc;
            left:0;
            bottom:-5px;
        }


    </style>
    <script>
      var skin = localStorage.getItem('skin') || 'default';
      var unusedLink = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      unusedLink.setAttribute('rel', '');
      unusedLink.setAttribute('disabled', true);
    </script><!-- END THEME STYLES -->
  </head>
  <body>


 <!-- .app -->
 <div class="app">
       @include('back.layouts.header')
          @yield('content')
       @include('back.layouts.footer')
 </div>


 <!-- BEGIN BASE JS -->
 <script src="{{ asset('back/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('back/vendor/bootstrap/js/popper.min.js') }}"></script>
 <script src="{{ asset('back/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
 <!-- BEGIN PLUGINS JS -->
 <script src="{{ asset('back/vendor/pace/pace.min.js') }}"></script>
 <script src="{{ asset('back/vendor/stacked-menu/stacked-menu.min.js') }}"></script>
 <script src="{{ asset('back/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
 <script src="{{ asset('back/vendor/flatpickr/flatpickr.min.js') }}"></script>
 {{-- <script src="{{ asset('back/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script> --}}
 <script src="{{ asset('back/stylesheets/tagsinput.js') }}"></script>
 {{-- <script src="{{ asset('back/vendor/chart.js/Chart.min.js') }}"></script> <!-- END PLUGINS JS --> --}}
 <!-- BEGIN THEME JS -->
 <script src="{{ asset('back/javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
 <!-- BEGIN PAGE LEVEL JS -->
 {{-- <script src="{{ asset('back/javascript/pages/dashboard-demo.js') }}"></script> <!-- END PAGE LEVEL JS --> --}}
 @yield('scripts')
</body>
</html>
