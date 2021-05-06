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
                        <td colspan="3">
                            {{$user->address}}
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
                </div>
                <hr>
            </div>
          
        </div>

    </div>

    @if ($jobs->count()>0)
    <div class="big_section  pt-3 mt-3 d-none d-md-block">
        <div class="shadow pb-3">

            <div class="title">
                <span class="normal">
                    Posted Jobs
                </span>
    
            </div>
            <hr class="my-1">
            <hr class="my-1">
            <div class="desc">
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->active==1?"Running":"Closed"}}</td>
                        </tr>
                    @endforeach
                </table>
    
            </div>
        </div>
    </div>
    <div class="big_section  pt-3 mt-3 d-block d-md-none">
        <div class="title">
            <span class="normal">
                Posted Jobs
            </span>

        </div>
        
        <div class="">
            @foreach ($jobs as $job)
            <div class=" shadow mb-3">
                <div class="row px-2 pt-4 pb-2">
                    <div class="font-weight-bold col-3 text-right">
                        Title:
                    </div>
                    <div class="col-9">
                        {{$job->title}}
                    </div>
                    <div class="col-3 text-right font-weight-bold">
                        Status:
                    </div>
                    <div class="col-9">
                        {{$job->active==1?"Running":"Closed"}}
                    </div>
                </div>
                <hr class="m-0">
                <div class="px-2 text-right">
                    <a class="btn btn-link font-weight-bold" href="" class="pr-2">View</a>
                    <a class="btn btn-link font-weight-bold" href="" class="pr-2">Edit</a>
                </div>
            </div>
                
            @endforeach
        </div>
    </div>
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
@endsection
@section('js')

@endsection
 
 