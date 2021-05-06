@extends('back.layouts.app')
@section('title','Single Job Seeker')
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
                                <h3 class="page-title w-100"> Job  - {{$job->id}} 
                                    <hr class="my-1">
                                        {{$job->title}}  
                                    <hr class="my-1">
                                </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
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
                                     <th>Posted</th>
                                </tr>
                                   <tr>
                                       <td>{{ $job->id }}</td>
                                       <td>{{ $job->user->name }}</td>
                                       <td>{{ $job->user->address }}</td>
                                       <td>{{ $job->user->phone }}</td>
                                       <th>{{$job->created_at->diffForHumans()}}</th>
                                   </tr>
                            </table>
                            <div class="list">
                                <div class="row">
                                    @if (isset($info['basename']))
                                        
                                    <div class="col-md-6">
                                        <h4>Files</h4>
                                        <div class="p-2">

                                            @if($isimage)
                                                <img src="{{asset($job->file)}}" alt="" class="w-100">
                                            @endif
                                                <div class="form-control p-2 d-flex justify-content-between">
                                                    <span>
                                                        {{$info['basename']}}
                                                    </span>
                                                    <a href="{{asset($job->file)}}"  target="_blank" class="">Download</a>
                                                </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="{{isset($info['basename'])?'col-md-6':'col-mc-12'}}">
                                        <h4>Job Detail</h4>
                                        <div class="p-2">
                                            {{$job->desc}}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!-- /.card-body -->
                       
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
