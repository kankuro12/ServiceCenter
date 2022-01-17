@extends('back.layouts.app')
@section('title','Jobs')
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
                                <h3 class="page-title mr-sm-auto"> Jobs  </h3><!-- .btn-toolbar -->
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
                                    <th>Job</th>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Phone</th>
                                    <th>Applicants</th>
                                    <th>Due Date</th>
                                    <th>Posted</th>
                                    <th></th>
                               </tr>
                                 @foreach ($jobs as $k => $attr)
                                  <tr>
                                      <td>{{ $attr->id }}</td>
                                      <td>{{$attr->title}}</td>
                                      <td>{{ $attr->name }}</td>
                                      <td>{{ $attr->company }}</td>
                                      <td>{{ $attr->phone }}</td>
                                      <td>{{ $attr->applicants}}</td>
                                      <td>{{ $attr->lastdate->format('d-m-Y')}}</td>
                                      <th>{{$attr->created_at->format('d-m-Y')}}</th>
                                      <td>
                                          <a class="btn btn-primary btm-sm" target="_blank" href="{{route('admin.job-Single',['job'=>$attr->id])}}">
                                              Detail
                                          </a>
                                      </td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $jobs->links() }}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
