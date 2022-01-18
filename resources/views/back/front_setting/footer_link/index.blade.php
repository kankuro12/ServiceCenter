@extends('back.layouts.app')
@section('title','Footer Links')
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
                                <h3 class="page-title mr-sm-auto"> Footer Links </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <a href="{{ route('footerlink.create',['id'=>request()->get('id')]) }}" class="btn btn-primary">Create New</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>Link Header</th>
                                    <th>Link Title</th>
                                    <th>Link Url</th>
                                    <th colspan="2">Action</th>
                               </tr>
                                 @foreach (\App\Footerlink::where('footerheader_id',request()->get('id'))->get() as $attr)
                                  <tr>
                                      <td>{{ $attr->header->title }}</td>
                                      <td>{{ $attr->title }}</td>
                                      <td>{{ $attr->link }}</td>
                                      <td width="50px">
                                          <!-- <a href="{{ route('footerlink.edit',$attr->id) }}" class="badge badge-primary">edit</a> -->
                                      </td>
                                      <td>
                                          <form action="{{ route('footerlink.destroy',$attr->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="badge badge-danger" onclick="return confirm('Are You Sure?');">Delete</button>
                                          </form>
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
