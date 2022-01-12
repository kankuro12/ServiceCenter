@extends('Need.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('front/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/rcrop.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    @yield('newcss')
@endsection
@section('title')
    Vendor Dashboard - @yield('newtitle')
@endsection
@section('content')
    <div id="vendor-dashboard-page">
        <div class="sidebar shadow">
            @include('Need.vendor.dashboard.sidebar')
        </div>

        <div class="main">
            <div class="top-bar">
                <div class="d-inline-flex align-items-center">
                    <button class="btn no-outline" id="toogle-sidebar">
                        <i class="material-icons">menu</i>
                    </button>
                </div>
                <div>

                </div>
            </div>
            <div>
                <div class="jumbo">
                    <div class="jumbo-inner">
                        <a href="{{route('n.front.vendor.index')}}">Dashboard</a>
                        @yield('jumbo')
                    </div>
                    <div>
                        @yield('buttons')
                    </div>
                </div>
            </div>
            @yield('newcontent')
        </div>

    </div>

@endsection
@section('js')
<script src="{{asset('front/js/rcrop.min.js')}}"></script>
@yield('includejs')
@include('Need.vendor.dashboard.imagejs')
@include('Need.vendor.dashboard.namejs')
    <script>
        $(function () {
            $('#concat-us-section').remove();
            $('header').remove();

            $('.main').click(function(e) {
                // e.preventDefault();
                $('#vendor-dashboard-page').removeClass('active');

            });

            $('#toogle-sidebar').click(function (e) {
                e.stopPropagation();
                e.preventDefault();
                $('#vendor-dashboard-page').toggleClass('active');
            });
        });
    </script>
    @yield('newjs')
@endsection
