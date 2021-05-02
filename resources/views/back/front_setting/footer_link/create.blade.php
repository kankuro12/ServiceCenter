@extends('back.layouts.app')
@section('title','Create Footer link')
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
                                <h3 class="page-title mr-sm-auto"> Create New Footer Link  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('footerlink.index') }}" class="btn btn-primary">Footer Link List</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                                <form action="{{ Route('footerlink.store') }}" method="POST">
                                    @csrf
                                    @include('back.layouts.message')
                                    
                                    <div class="form-group">
                                         <label for="title"> Link Title <span style="color:red;">*</span></label>
                                         <input type="text" name="title" placeholder="Enter Link Title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                         <label for="link"> Link <span style="color:red;">*</span></label>
                                         <input type="text" name="link" placeholder="Enter Link (url)" class="form-control" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="title"> Link Category <span style="color:red;">*</span></label>
                                        <select name="head_id" class="form-control" required>
                                            <option value="">==== Select Amount Type ====</option>
                                            @foreach(\App\Footerheader::all() as $f)
                                               <option value="{{ $f->id }}">{{ $f->title }}</option>
                                            @endforeach
                                        </select>
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
