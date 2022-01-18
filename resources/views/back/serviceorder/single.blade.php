@extends('back.layouts.app')
@section('title','Single Order')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> Order  - {{$order->id}} </h3><!-- .btn-toolbar -->
                                <div class=" btn-group">
                                    <button class="btn btn-secondary" id="order_{{$order->id}}" onclick="complete({{$order->id}})">Close Order</button>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body p-4">

                            <table class="table table-bordered ">
                                <tr>
                                     <th>REF ID</th>
                                     <th>Name</th>
                                     <th>Address</th>
                                     <th>Phone</th>
                                     <th>Service</th>
                                     <th>Delivery</th>
                                     <th>Price</th>
                                     <th>
                                         Total
                                     </th>
                                     <th>Posted</th>
                                </tr>
                                   <tr>
                                       <td>{{ $order->id }}</td>
                                       <td>{{ $order->user->name }}</td>
                                       <td>{{ $order->user->address }}</td>
                                       <td>{{ $order->user->phone }}</td>
                                       <td>{{ $order->sc }}</td>
                                       <td>{{ $order->dc }}</td>
                                       <td>{{ $order->total }}</td>
                                       <td>
                                           {{$order->total+$order->sc+$order->dc}}
                                       </td>
                                       <th>{{$order->created_at->diffForHumans()}}</th>
                                   </tr>
                            </table>
                            <div class="list">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h4>Order Extra Detail</h4>
                                        <div class="p-2">
                                            {{$order->desc}}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if($order->service_type_id!=null)
                            <div class="my-3 p-3 shadow">
                                <h4>Bike Detail</h4>
                                <hr class="m-0">
                                <div class="py-2">
                                    <table class="w-100">
                                        <tr>
                                            <th>
                                                Company
                                            </th>
                                            <td>
                                                {{$order->company}}
                                            </td>
                                            <th>
                                                Model
                                            </th>
                                            <td>
                                                {{$order->model}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Year
                                            </th>
                                            <td>
                                                {{$order->year}}
                                            </td>
                                            <th>
                                                Version
                                            </th>
                                            <td>
                                                {{$order->version}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <div class="my-3 p-3 shadow">
                                <h4>Service Detail</h4>
                                <hr class="m-0">
                                    @php
                                        $service=\App\Models\ServiceType::find($order->service_type_id);
                                        $serviceItems=\App\Models\ServiceOrderItem::where('service_orders_id',$order->id)->get();
                                        // dd($serviceItems);
                                    @endphp
                                    <h5>
                                        Package:- {{$service->title}}
                                    </h5>
                                <hr class="m-0">

                                <div class="py-2">


                                                @foreach ($serviceItems as $item)
                                                        @php
                                                            $s=\App\Models\ServiceTypeItem::find($item->service_type_item_id)
                                                        @endphp
                                                    <h6>
                                                        &#10003; {{$s->title}}
                                                    </h6>

                                                @endforeach
                                        </div>

                            </div>
                            @endif

                            @php
                                $ois=App\Orderitem::where('service_orders_id',$order->id)->get();
                            @endphp
                            @if ($ois->count()>0)
                            <div class="my-3 p-3 shadow">
                                <h4>Products</h4>
                                <hr class="m-0">
                                <div class="py-2">
                                    <div class="row">
                                        @foreach ($ois as $oi)

                                            <div class="col-md-3">
                                                <div class="shadow">

                                                    <img src="{{asset('/back/images/product/'.$oi->product->feature_image)}}" alt="" class="w-100">
                                                    <div class="p-2">
                                                        {{$oi->product->name}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div><!-- /.card-body -->

                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
@section('scripts')
    <script>
        lock=false;
        _id=0;
        token="{{csrf_token()}}";
        function complete(id){
            _id=id;
            console.log(id);
            if(!lock){
                if(confirm('Do You Want To Complete Order?')){
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.serviceOrderComplete')}}",
                        data: {
                            "id":id,
                            "_token":token
                        },

                        success: function (response) {
                            $('#order_'+id).remove();
                            lock=false;
                        }
                    });
                }
            }
        }
    </script>
@endsection
