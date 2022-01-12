@extends('Need.vendor.dashboard.index')
@section('newcss')
    <style>
        .delivery-image{
            height: 200px;
            overflow: hidden;
        }
        @media (max-width:426px){
            .delivery-image{
                height: 100px;
                overflow: hidden;
            };
        }

    </style>
@endsection
@section('jumbo')
    <span>
        Deliveries
    </span>
@endsection
@section('buttons')
@endsection
@section('newtitle', 'Deliveries')
@section('newcontent')
    <div class="row m-0">
        @foreach ($deliveries as $delivery)
            <div class="col-md-4 col-6 p-0 pb-2">
                <div class=" bg-white shadow mb-3 h-100" style="break-inside: avoid-column;">
                    <div class="delivery-image">

                            <img src="{{ asset($delivery->file) }}" alt="" class="w-100">

                    </div>
                    <div class="card-body d-md-flex d-none justify-content-between align-items-center">
                        <span class="">
                            <strong class="d-none d-md-inline">status</strong>
                            <span class="badge  {{ $delivery->status == 0 ? 'bg-warning' : 'bg-success' }}">
                                {{ $delivery->status == 0 ? 'Pending' : 'Completed' }}
                            </span>
                        </span>
                        <button  class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#delivery-{{$delivery->id}}">
                            Detail
                        </button>
                    </div>
                    <div class="p-2 d-md-none d-block justify-content-between align-items-center">
                        <div class="text-center py-2">
                            <span class="badge  {{ $delivery->status == 0 ? 'bg-warning' : 'bg-success' }}">
                                {{ $delivery->status == 0 ? 'Pending' : 'Completed' }}
                            </span>
                        </div>
                        <button  class="btn btn-sm btn-primary w-100" data-bs-toggle="modal" data-bs-target="#delivery-{{$delivery->id}}">
                            Detail
                        </button>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    @foreach ($deliveries as $delivery)
        <!-- Modal -->
        <div class="modal fade" id="delivery-{{$delivery->id}}" tabindex="-1" role="dialog"
            aria-labelledby="delivery-{{$delivery->id}}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset($delivery->file) }}" alt="" class="w-100">
                            </div>
                            <div class="col-md-6 d-block d-md-flex align-items-center">
                                <div>
                                    {{$delivery->desc}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('includejs')

@endsection
@section('newjs')
    <script>

    </script>
@endsection
