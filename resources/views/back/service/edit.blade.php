@extends('back.layouts.app')
@section('title','Edit Service')
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
                                <h3 class="page-title mr-sm-auto"> Edit Service </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('service.index') }}" class="btn btn-primary">Services List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ route('service.update',$service->id) }}" method="POST">
                                    @csrf
                                    @include('back.layouts.message')

                                    <div class="form-group">
                                         <label for="title"> Service Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" value="{{ $service->title }}" placeholder="Enter Service Title" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="title"> Details </label>
                                        <textarea name="desc" rows="5" class="form-control">{{ $service->desc }}</textarea>
                                   </div>
                                   <div class="col-md-2">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Status :</span> <!-- .switcher-control -->
                                            <label class="switcher-control switcher-control-lg"><input type="checkbox" name="active" class="switcher-input" {{$service->active==1?'checked':''}}> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                                    </div>
                                   </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block">Save Item</button>
                                </form>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
