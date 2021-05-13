@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="shadow-md p-0 p-md-3">
            <div class="pt-2">
                <Button class="btn btn-primary mr-2 mb-2">Change Password</Button>
                <Button class="btn btn-primary mb-2">Edit Profile</Button>
            </div>
            <hr class="mt-2">
            <div class="d-none d-md-block">

                <table class="table ">
                    <tr>
                        <th class="text-right">Name:</th><td>{{$user->name}}</td>
                        <th class="text-right">Phone:</th><td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">
                            Address:
                        </th>
                        <td >
                            {{$user->address}}
                        </td>
                        <th class="text-right">
                            Subscription:
                        </th>
                        <td >
                            @if ($state==0)
                                No Subscription
                            @elseif ($state==1)
                                Subscription Pending
                            @elseif ($state==2)
                                {{$sub->sub()->title}}
                                Valid Till {{$sub->validTill}}
                            @elseif ($state==3)
                                {{$sub->sub()->title}}
                                Expired
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="d-block d-md-none">
                <div class="row">
                    <div class="col-4 text-right font-weight-bold">Name:</div>
                    <div class="col-8 pl-0">{{$user->name}}</div>
                    <div class="col-4 text-right font-weight-bold">Phone:</div>
                    <div class="col-8 pl-0">{{$user->phone}}</div>
                    <div class="col-4 text-right font-weight-bold">Address:</div>
                    <div class="col-8 pl-0">{{$user->address}}</div>
                    <div class="col-4 text-right font-weight-bold">Subscription:</div>

                    <div class="col-8 pl-0">
                        @if ($state==0)
                        No Subscription
                        @elseif ($state==1)
                            Subscription Pending
                        @elseif ($state==2)
                            {{$sub->sub()->title}}
                            Valid Till {{$sub->validTill}}
                        @elseif ($state==3)
                            {{$sub->sub()->title}}
                            Expired
                        @endif
                    </div>
                </div>
                <hr>
            </div>
          
        </div>

    </div>


    <div class="big_section mt-5 pt-0">
        <div class="row">
            
            @if ($jobs->count()>0)
            <div class="col-md-6 pb-3">
                <div class=" shadow pt-3  ">
                    <div>
            
                        <div class="title">
                            <span class="normal">
                                Posted Jobs
                            </span>
                
                        </div>
                      
                        <hr class="my-1">
                        <div class="desc">
                            <table class="table">
                                <tr>
                                    <th>REF ID</th>
                                    <th>Title</th>
                                    <th>

                                    </th>
                                    {{-- <th>Status</th> --}}
                                </tr>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{$job->id}}</td>
                                        <td>{{$job->title}}</td>
                                        <th>
                                            <a href="">Detail</a>
                                        </th>
                                        {{-- <td>{{$job->active==1?"Running":"Closed"}}</td> --}}
                                    </tr>
                                @endforeach
                            </table>
                
                        </div>
                    </div>
                </div>
            </div>
            @endif

            
            @if ($cvs->count()>0)
            <div class="col-md-6 pb-3">
                <div class=" shadow pt-3  ">
                    <div>
                        <div class="title">
                            <span class="normal">
                                CV
                            </span>
                        </div>
                        <hr class="my-1">
                        <div class="desc" style="overflow-y:auto;">
                            <table class="table">
                                <tr>
                                    <th>REF ID</th>
                                    <th>CV</th>
                                    <th></th>
                                </tr>
                                @foreach ($cvs as $cv)
                                @php
                                    $info=pathinfo($cv->file);
                                    
                                @endphp
                                    <tr>
                                        <td>{{$cv->id}}</td>

                                        <td>
                                            @if(isImage($cv->file))
                                                <img src="{{asset($cv->file)}}" style="max-width: 150px;" alt="">
                                            @else
                                                {{$info['basename']}}
                                            @endif
                                        </td>
                                        {{-- <td>{{$job->active==1?"Running":"Closed"}}</td> --}}
                                        <td><a href="{{asset($cv->file)}}" target="_blank">Download</a></td>
                                    </tr>
                                @endforeach
                            </table>
                
                        </div>
                    </div>
                </div>
            </div>
            @endif

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
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                @foreach ($orders  as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->company}}</td>
                                        <td>{{$order->year}}</td>
                                        <td>{{$order->model}}</td>
                                        <td>{{$order->version}}</td>
                                        <td>{{$order->total}}</td>
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
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')

@endsection
 
 