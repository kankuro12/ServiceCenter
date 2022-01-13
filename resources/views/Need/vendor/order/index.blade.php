@extends('Need.vendor.dashboard.index')
@section('newcss')

@endsection
@section('jumbo')
    <span>
        Orders
    </span>
@endsection
@section('buttons')
@endsection
@section('newtitle', 'Orders')
@section('newcontent')
    <div class="">
        @foreach ($orders as $order)
            @include('Need.vendor.order.single')
        @endforeach
    </div>

@endsection
@section('includejs')

@endsection
@section('newjs')
    <script>

    </script>
@endsection
