@extends('back.layouts.app')
@section('title','Service items')
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
                                <h3 class="page-title mr-sm-auto"> List Of Service Items </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('service.item.create') }}" class="btn btn-primary">Create New Service Item</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Item Title</th>
                                    <th>Detail</th>
                                    <th>Service</th>
                                    <th>Action</th>
                               </tr>
                                 @foreach(App\Models\ServiceTypeItem::get() as $ser)
                                    <tr>
                                        <td>{{ $ser->title }}</td>
                                        <td>{{ $ser->desc }}</td>
                                        <td>{{ $ser->service->title }}</td>
                                        <td>
                                            <a href="{{ route('service.item.edit',$ser->id) }}" class="badge badge-primary">Edit</a>
                                            <a href="{{ route('service.item.delete',$ser->id) }}" onclick="return confirm('Are you sure?');" class="badge badge-danger">Delete</a>
                                        </td>
                                    </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">

                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
