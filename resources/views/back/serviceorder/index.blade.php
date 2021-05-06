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
                                <h3 class="page-title mr-sm-auto"> Orders  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>REF ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Posted</th>
                                    <th></th>
                               </tr>
                                 @foreach ($orders as $k => $attr)
                                  <tr>
                                      <td>{{ $attr->id }}</td>
                                      {{-- <td>{{$attr->title}}</td> --}}
                                      <td>{{ $attr->user->name }}</td>
                                      <td>{{ $attr->user->address }}</td>
                                      <td>{{ $attr->user->phone }}</td>
                                      <td>{{ $attr->total }}</td>
                                      <th>{{$attr->created_at->diffForHumans()}}</th>
                                      <td>
                                          <a class="btn btn-primary btm-sm" target="_blank" href="{{route('admin.serviceOrderSingle',['order'=>$attr->id])}}">
                                              View Detail
                                          </a>
                                      </td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
