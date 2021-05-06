@extends('Need.layout')
@section('content')
<div class="big_section">
    <div class="py-3">
        <h5 >
            <a class="d-inline-block" href="{{route('n.front.user')}}">User Dashboard</a> / 
            <span class="d-inline-block">Single Order</span> 
            <hr class="my-2 d-block d-md-none">
        </h5>
    </div>
    <div class="">
        <div style="overflow-x:auto">
            <table class="table table-bordered ">
                <tr>
                     <th>REF ID</th>
                     <th>Name</th>
                     <th>Address</th>
                     <th>Phone</th>
                     <th>Total</th>
                     <th>Posted</th>
                </tr>
                   <tr>
                       <td>{{ $order->id }}</td>
                       <td>{{ $order->user->name }}</td>
                       <td>{{ $order->user->address }}</td>
                       <td>{{ $order->user->phone }}</td>
                       <td>{{ $order->total }}</td>
                       <th>{{$order->created_at->diffForHumans()}}</th>
                   </tr>
            </table>
            <div class="text-center">
                &#8592;	 scroll  &#8594;	
            </div>
        </div>                     
        {{-- <div class="list">
            <div class="row">
               
                <div class="col-md-12">
                    <h4>Order Extra Detail</h4>
                    <div class="p-2">
                        {{$order->desc}}
                    </div>
                </div>
            </div>
            
        </div> --}}
        
        @if($order->service_type_id!=null)
        <div class="my-3 p-3 shadow">
            <h4>Bike Detail</h4>
            <hr class="m-0">
            <div class="py-2" style="overflow-y:auto;">
                <table style="min-width:100%;">
                    <tr>
                        <th>
                            Company
                        </th>
                       
                        <th>
                            Model
                        </th>
                        
                    </tr>
                    <tr>
                        <td>
                            {{$order->company}}
                        </td>
                        <td>
                            {{$order->model}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Year
                        </th>
                       
                        <th>
                            Version
                        </th>
                       
                    </tr>
                    <tr>
                        <td>
                            {{$order->year}}
                        </td>
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
                                <h6 class="d-flex justify-content-between">
                                    <span>
                                        &#10003; {{$s->title}}
                                    </span>
                                    <span>
                                        Rs. {{$item->rate}}
                                    </span>
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
                                <div class="p-2 text-center" >
                                    {{$oi->product->name}} 
                                    <hr class="my-1">
                                    Rs. {{$oi->rate}}
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
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')

@endsection
 
 