@extends('back.layouts.app')
@section('title','Create Service Item')
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
                                <h3 class="page-title mr-sm-auto"> Create New Service Item </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('service.item.index') }}" class="btn btn-primary">Service Item List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ route('service.item.store') }}" method="POST">
                                    @csrf
                                    @include('back.layouts.message')
                                    {{-- @if ($errors->any())
                                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error has been occurred !</strong>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="title"> Services <span style="color:red;">*</span></label>
                                            <select name="service_type_id" class="form-control">
                                                <option></option>
                                                @foreach (App\Models\ServiceType::all() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title"> Service Item Title <span style="color:red;">*</span></label>
                                                <input type="text" name="title" placeholder="Enter Service Title" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title"> Details </label>
                                        <textarea name="desc" rows="5" class="form-control"></textarea>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <label for="title"> Price </label>
                                            <input type="number" name="price" min="0" value="0" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title"> Sale Price </label>
                                            <input type="number" name="sale_price" min="0" value="0" class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Onsale :</span> <!-- .switcher-control -->
                                            <label class="switcher-control switcher-control-lg"><input type="checkbox" name="onsale" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
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
