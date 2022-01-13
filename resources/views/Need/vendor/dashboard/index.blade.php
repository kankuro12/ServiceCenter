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
            <button id="toogle-sidebar-btn" class="d-inline-block d-md-none" style="position: absolute;top:10px;right:10px;border:none;background: transparent;">
                <span class="material-icons">
                    close
                </span>
            </button>
        </div>

        <div class="main">
            <div class="top-bar">
                <div class="d-inline-flex align-items-center">
                    <button class="btn no-outline" id="toogle-sidebar">
                        <i class="material-icons">menu</i>
                    </button>
                </div>
                <div>
                    <ul class="text-end ">
                        <li class="d-inline ps-3"><a href="{{route('n.front.book.step1')}}" class="{{Route::is('n.front.book.step1')?'active':''}}">Bike Service</a></li>
                        <li class="d-inline ps-3"><a href="{{route('n.front.delivery')}}" class="{{Route::is('n.front.delivery')?'active':''}}">Delivery</a></li>
                        <tp></tp>
                        <li class="d-inline ps-3"><a href="{{route('n.front.book.shop')}}" class="{{Route::is('n.front.book.shop')?'active':''}}">Shop</a></li>
                        <li class="d-inline ps-3"><a href="{{route('n.front.subs')}}" class="{{Route::is('n.front.subs')?'active':''}}">Subcription</a></li>
                    </ul>
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
            $('#toogle-sidebar-btn').click(function (e) {
                e.stopPropagation();
                e.preventDefault();
                $('#vendor-dashboard-page').toggleClass('active');
            });
        });
    </script>
    @yield('newjs')
@endsection
