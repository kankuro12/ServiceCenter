@extends('back.layouts.app')
@section('title','Orders')
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
                                <h3 class="page-title mr-sm-auto"> Messages  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                          
                            <div class="">
                                <table class="table">
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Message
                                        </th>
                                        <th>
                        
                                        </th>
                                    </tr>
                                      
                                        @foreach ($msgs as $msg)
                                            <tr>
                                                <td>{{$msg->name}}</td>
                                                <td>{{$msg->phone}}</td>
                                                <td>{{$msg->email}}</td>
                                                <td>{{$msg->message}}</td>
                                                <td>
                                                    {{$msg->created_at->diffForHumans()}}
                                                </td>
                                            </tr>     
                                        @endforeach
                                </table>
                                
                            </div>
                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $msgs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
