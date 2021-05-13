@extends('Need.layout')
@section('content')
    <style>
        .table tr th{
            width:33%;
        }
    </style>
    <div class="big_section">
        <div class="title">
           <span class="normal">
               Bike 
            </span> 
            <span class="other"> Servicing</span>
        </div>
        <div class="desc py-3 text-center">
            {{custom_config('bs_long')->value??""}}
        </div>
        <div class="mx-md-5 mx-0">
                <div class="d-block d-md-flex w-100 py-3 text-center" >
                    <div style="flex:1;border-radius:0;margin-top:10px;" class="btn btn-secondary">Bike Details</div>
                    <div style="flex:1;border-radius:0;margin-top:10px;border-right:1px white solid;border-left:1px solid white;" class="btn btn-secondary">Choose Package</div>
                    <div style="flex:1;border-radius:0;margin-top:10px;" class="btn btn-primary">CheckOut</div>
                </div>

                <div class=" mt-2 mt-md-5 pt-2 pt-2 pt-md-5 pb-md-5 shadow-md">

                    {{-- <div class="min-title py-2">
                        {{$title}}
                    </div>
                    <hr> --}}
                    <div class="row px-2 px-md-4">

                        <div class="col-md-6  py-2 ">
                            <div class="bg-white py-3 shadow">
                                <div class=" px-2 py-1 min-title normal" style="text-align: left;">
                                    Billing Infomation
                                </div>
                                <hr class="bg-black my-1" style="background-color:#2c2c2c;">
                                <div  >
                                    <table class="table">
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Address
                                            </th>
                                            <td>
                                                {{$user->address}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Phone
                                            </th>
                                            <td>
                                                {{$user->phone}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            
                            
                            </div>
                            <div class="mt-3 bg-white shadow">
                                <div class=" px-2 py-1 min-title normal" style="text-align: left;">
                                    Bike Infomation
                                </div>
                                <hr class="bg-black my-1" style="background-color:#2c2c2c;">

                                <div  >
                                    <table class="table">
                                        <tr>
                                            <th>Company</th>
                                            <td>{{$company}}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Model
                                            </th>
                                            <td>
                                                {{$model}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Year
                                            </th>
                                            <td>
                                                {{$year}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Version
                                            </th>
                                            <td>
                                                {{$version}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="py-2 text-center">
                                    <a href="{{route('n.front.book.step1')}}">Change Bike Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  py-2">
                                    @php
                                        
                                        $total1=0;
                                        $total2=0;
                                    @endphp
                            @if (count($services)>0)
                                
                            <div class="bg-white py-3 mb-3 shadow">

                                <div class=" px-2 py-1 min-title normal" style="text-align: left;">
                                    {{$package->title}}
                                </div>
                                <hr class="bg-black my-1" style="background-color:#2c2c2c;">
                                <div  >
                                    <table class="table">
                                        @foreach ($services as $service)
                                            <tr>
                                                <th>
                                                    {{$service->title}}
                                                </th>
                                                <td>

                                                    @php
                                                        $m_total=$service->onsale==1?$service->sale_price:$service->price;
                                                        $total1+=$m_total;
                                                    @endphp
                                                    Rs.{{$m_total}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th class="other">
                                                Sub Total
                                            </th>
                                            <td>
                                                Rs. {{$total1}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="py-2 text-center">
                                    <a href="{{route('n.front.book.step2')}}">Change Service Detail</a>
                                </div>
                            </div>
                            @endif
                            @if(count($products)>0)
                            <div class="bg-white py-3 shadow">

                                <div class=" px-2 py-1 min-title normal" style="text-align: left;">
                                    Products
                                </div>
                                <hr class="bg-black my-1" style="background-color:#2c2c2c;">
                                <div  >
                                    <div class="row m-0 mb-2">
                                            @foreach ($products as $product)
                                            <div class="col-md-6 pb-2">
                                                <div class="product shadow">
                                                    <div class="top" >
                                                        <div class="" >
                                                            <img class="w-100" src="{{asset('/back/images/product/'.$product->feature_image)}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="bottom">
                                                        <div class="title">
                                                            {{$product->name}}
                                                        </div>
                                                        <div class="price">
                                                            @if ($product->onsale )
                                                            @php
                                                                $total2+=$product->price;
                                                            @endphp
                                                                <span class="new">Rs. {{floatval($product->price)}}</span>
                                                            @else
                                                            @php
                                                                $total2+=$product->sales_price;
                                                            @endphp
                                                                <span class="new">Rs. {{floatval($product->sales_price)}}</span>
                                                            @endif
                                                        </div>
                                                        <div class=" add_to_cart">
                                                            <div >
                                                                <button class="btn btn-danger cart " onclick="removeFromCart({{$product->id}})">Remove From Cart</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                                <hr class="bg-black my-1" style="background-color:#2c2c2c;">
                                <div class="d-flex py-2 px-4 ">
                                    <span style="width:33.33%" class="other">
                                        <strong>
                                            Sub Total
                                        </strong>
                                    </span>
                                    <span style="flex-grow:1;">Rs. {{$total2}}</span>
                                </div>
                                <hr class="bg-black my-1" style="background-color:#2c2c2c;">
                                <div class="py-2 text-center">
                                    <a href="{{route('n.front.book.shop')}}">Change Cart Products</a>

                                </div>
                            </div>
                         
                            @endif
                        </div>
                    </div>
                    @php
                        $dc=custom_config('delivery_charge')->value??0;
                    @endphp
                    <form class="mx-2 mx-md-4 px-2 mt-2 mt-md-4 shadow" action="{{route('n.front.book.checkout')}}" method="post">
                        @csrf
                        <div class="form-group pb-2 pt-4  d-none d-md-flex justify-content-between">
                            <div class=" py-2 d-none d-md-flex " style="width:50%;">
                                <span class="other mx-2">
                                    <strong>
                                       Delivery Charge : 
                                    </strong>
                                </span>
                                <span style="flex-grow:1;"> Rs. {{$dc}}</span>
                            </div>
                            <div class=" py-2 d-none d-md-flex " style="width:50%;">
                                <span class="other mx-2">
                                    <strong>
                                        Grand Total : 
                                    </strong>
                                </span>
                                <span style="flex-grow:1;"> Rs. {{$total2+$total1+$dc}}</span>
                            </div>
                            
                            <button class="mb-3 mt-md-0 submit d-none d-md-inline-block"  >Comfirm And Checkout >></button>
                        </div>
                        <div class="form-group mb-0 pb-0  bg-white  d-block d-md-none " style="position: fixed; bottom:0px;left:0px;right:0px;box-shadow:0px 0px 10px 0px rgba(0,0,0,0.25);z-index:2;"> 
                            <div class="py-2 d-flex d-md-none justify-content-center" style="width:100%;">
                                <span class="other mx-2" >
                                    <strong>
                                        Delivery Charge : 
                                    </strong>
                                </span>
                                <span > Rs. {{$dc}}</span>
                            </div>
                            <div class="py-2 d-flex d-md-none justify-content-center" style="width:100%;">
                                <span class="other mx-2" >
                                    <strong>
                                        Grand Total : 
                                    </strong>
                                </span>
                                <span > Rs. {{$total2+$total1+$dc}}</span>
                            </div>
                            <button class="mt-md-0 submit"   style="border-radius: 0px; ">Comfirm And Checkout >></button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')

@endsection
 
 