@extends('back.layouts.app')
@section('title','Subscription Packages')
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
                                <h3 class="page-title mr-sm-auto"> Subscription Packages </h3><!-- .btn-toolbar -->
                                {{-- <h3 class="page-title mr-sm-auto"> List Of Slider </h3><!-- .btn-toolbar --> --}}
                                <div class="dt-buttons btn-group">
                                    {{-- <button class="btn btn-primary">Create New </button> --}}
                                </div><!-- /.btn-toolbar -->
                            </div>
                            <hr>
                            <form action="{{route('admin.subs.add')}}" method="post" id="add">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="">Package Name</label>
                                        <input type="text" required class="form-control" name="title">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Package Price</label>
                                        <input type="number" step="0.01" min="0" required class="form-control" name="price">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Package Description</label>
                                        <textarea type="text" required class="form-control" name="desc" required></textarea>
                                    </div>
                                    <div class="p-3 "><button class="btn btn-success px-5">Add</button></div>
                                </div>
                            </form>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                            
                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            @foreach ($subs as $sub)
                                @include('back.subs.single',['sub'=>$sub])
                            @endforeach
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
