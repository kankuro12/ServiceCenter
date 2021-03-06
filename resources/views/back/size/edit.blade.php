@extends('back.layouts.app')
@section('title','Edit Size')
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
                            <h3 class="page-title mr-sm-auto"> Edit Product Size </h3><!-- .btn-toolbar -->
                            <div class="dt-buttons btn-group">
                                <a href="{{ route('size.index') }}" class="btn btn-primary">Size List</a>
                            </div><!-- /.btn-toolbar -->
                        </div>
                    </div><!-- /.card-header -->
                    <!-- .card-body -->
                    <div class="card-body">
                        <form action="{{ Route('size.update',$sub->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('back.layouts.message')
                            <div class="form-group">
                                <label for="title"> Title <span style="color:red;">*</span></label>
                                <input type="text" name="title" value="{{ $sub->name }}" placeholder="Enter Size Title"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="title"> Short Code <span style="color:red;">*</span></label>
                                <input type="text" name="shortcode" value="{{ $sub->shortcode }}"
                                    placeholder="Enter Size Short Code" class="form-control" required>
                            </div>

                            <!-- <div class="form-group">
                                       <label for="title"> Extra Price <span style="color:red;">*</span></label>
                                       <input type="text" name="price" value="{{ $sub->price }}" placeholder="Enter Extra Price (if it rquire)" class="form-control" value="0">
                                  </div> -->

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
