@extends('back.layouts.app')
@section('title','Footer Header')
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
                                <h3 class="page-title mr-sm-auto"> List Of Footer Header </h3><!-- .btn-toolbar -->

                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                            <table class="table table-bordered ">
                                <tr>
                                     <th>Title</th>
                                     <th colspan="2">Action</th>
                                </tr>
                                @foreach(\App\Footerheader::all() as $b)
                                <form action="" method="POST">
                                  @csrf
                                    <tr>
                                        <input type="hidden" name="title_id" value="{{ $b->id }}">
                                        <td><input type="text" name="title" value="{{ $b->title }}" class="form-control" required></td>
                                        <td>
                                            <button class="badge badge-primary mt-2">Update</button>
                                            <a class="badge badge-secondary ml-2" href="{{route('footerlink.index',['id'=>$b->id])}}">Links</a>
                                        </td>
                                    </tr>
                                </form>
                                @endforeach
                            </table>
                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
