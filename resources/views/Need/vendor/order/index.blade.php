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
    <div class="row m-0">
        @foreach ($deliveries as $delivery)
            <div class="col-md-4 col-6 p-0 pb-2">
                <div class=" bg-white shadow mb-3 h-100" style="break-inside: avoid-column;">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
@section('includejs')

@endsection
@section('newjs')
    <script>

    </script>
@endsection
