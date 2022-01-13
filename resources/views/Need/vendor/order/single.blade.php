<div href="{{route('n.front.vendor.single-order',['order'=>$order->id])}}" class="single-order-desc">
    <div class=" bg-white shadow mb-3 h-100" >
        <div class="card-body">
            <div class="d-flex py-2 justify-content-between">
                <strong>Order: #{{$order->id}}</strong>
                <span class="badge bg-{{$order->status==0?'warning':'success'}}">
                    {{$order->status==0?'Pending':'Completed'}}
                </span>

            </div>
            @php
                $services=$order->getServices();
            @endphp
            @if (count($services)>0)
                <hr class="m-0">
                <div >
                    <strong>Bike Detail</strong>
                    <hr class="m-0">
                    <div class="row ">
                        <div class="col-md-3  tp">
                            <strong>
                                Company
                            </strong>
                            <tp>
                            <span>
                                {{$order->company}}
                            </span>
                        </div>
                        <div class="col-md-3  tp">
                            <strong>
                                Model
                            </strong>
                            <tp>
                            <span>
                                {{$order->model}}
                            </span>
                        </div>
                        <div class="col-md-3  tp">
                            <strong>
                                Year
                            </strong>
                            <tp>
                            <span>
                                {{$order->year}}
                            </span>
                        </div>
                        <div class="col-md-3  tp">
                            <strong>
                                Version
                            </strong>
                            <tp>
                            <span>
                                {{$order->version}}
                            </span>
                        </div>
                    </div>

                </div>
                <hr class="my-1">
                <div>
                    <div class="row ">
                        @foreach ($services as $service)

                        <div class="col-md-3 py-0 py-md-2 ">
                            <div class="product-holder h-100">
                                <div class="service-name">
                                    {{$service->title}}
                                </div>
                                <div>
                                    Rs.{{$service->total+0}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr class="my-1">
            @endif
           @php
                $products=$order->getProductImages();
                // dd($products);
            @endphp
            @if (count($products)>0)

                <div class="row ">
                    @foreach ($products as $product)
                    <div class="col-md-3 py-0 py-md-2 ">
                        <div class="product-holder h-100">
                            <img src="{{asset($product->image)}}" alt="" class="d-inline d-md-none w-100">

                            <div class="d-none d-md-inline-block">
                                <img src="{{asset($product->image)}}" alt="" class="w-100">
                                <br>
                                <div class="service-name">
                                    {{$product->name}}
                                </div>
                            </div>
                            <div class="text-center">
                                Rs. {{$product->total+0}}
                            </div>
                        </div>
                        <div class="d-md-none d-block text-start">
                            <div class="service-name">{{$product->name}}</div>
                        </div>
                    </div>

                    @endforeach
                </div>
                <hr class="my-1">

            @endif
            <div class="row ">
                <div class="col-md-3 col-6 tp">
                    <strong>
                        Total
                    </strong>
                    <tp>
                    <span>
                        Rs.{{$order->total+0}}
                    </span>
                </div>
                <div class="col-md-3 col-6 tp">
                    <strong>
                        Delivery Charge
                    </strong>
                    <tp>
                    <span>
                        Rs.{{$order->dc+0}}
                    </span>
                </div>
                <div class="col-md-3 col-6 tp">
                    <strong>
                        Service Charge
                    </strong>
                    <tp>
                    <span>
                        Rs.{{$order->sc+0}}
                    </span>
                </div>
                <div class="col-md-3 col-6 tp">
                    <strong>
                        Net Total
                    </strong>
                    <tp>
                    <span>
                        Rs.{{($order->total+$order->sc+$order->dc)+0}}
                    </span>
                </div>
            </div>

            <hr class="my-1">
            {{-- <div class="btn btn-link text-center w-100">
                View Detail
            </div> --}}
        </div>
    </div>
</a>
