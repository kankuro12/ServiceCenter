@extends('Need.vendor.dashboard.index')
@section('newcontent')
<div class="bg-white shadow">
    <div class="card-body">
        <div class="row">
            @if($orders->count()>0)
            <div class="col-md-12 pb-3">
                <div class=" shadow pt-3  ">
                    <div>
                        <div class="title">
                            <span class="normal">
                                Orders
                            </span>
                        </div>
                        <hr class="my-1">
                        <div class="desc" style="overflow-x: auto;">
                            <table class="table">
                                <tr>
                                    <th>REF ID</th>
                                    <th>Company</th>
                                    <th>Year</th>
                                    <th>Model</th>
                                    <th>Version</th>
                                    <th>Service</th>
                                    <th>Delivery</th>
                                    <th>Price</th>
                                    <th>
                                        Total
                                    </th>
                                    <th></th>
                                </tr>
                                @foreach ($orders  as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->company}}</td>
                                        <td>{{$order->year}}</td>
                                        <td>{{$order->model}}</td>
                                        <td>{{$order->version}}</td>
                                        <td>{{ $order->sc }}</td>
                                        <td>{{ $order->dc }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>
                                            {{$order->total+$order->sc+$order->dc}}
                                        </td>
                                        {{-- <td>{{$job->active==1?"Running":"Closed"}}</td> --}}
                                        <td><a href="{{route('n.front.user-order',['order'=>$order->id])}}">Detail</a></td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                        <div class="text-center">
                            &#8592;	 scroll  &#8594;
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($deliveries->count()>0)
            <div class="col-md-12 pb-3">
                <div class=" shadow pt-3  ">
                    <div>
                        <div class="title">
                            <span class="normal">
                                Delivery List
                            </span>
                        </div>
                        <hr class="my-1">
                        <div class="desc" style="overflow-x: auto;">
                            <table class="table">
                                <tr>
                                    <th>REF ID</th>
                                    <th>List</th>

                                    <th></th>
                                </tr>
                                @foreach ($deliveries  as $delivery)
                                @php
                                    $info=pathinfo($delivery->file);

                                @endphp
                                    <tr>
                                        <td>{{$delivery->id}}</td>

                                        <td>
                                            @if(isImage($delivery->file))
                                                <img src="{{asset($delivery->file)}}" style="max-width: 350px;" alt="">
                                            @else
                                                {{$info['basename']}}
                                            @endif
                                        </td>
                                        {{-- <td>{{$job->active==1?"Running":"Closed"}}</td> --}}
                                        <td><a href="{{asset($delivery->file)}}" target="_blank">Download</a></td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                        <div class="text-center">
                            &#8592;	 scroll  &#8594;
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
