@extends('back.layouts.app')
@section('title','Job Categories')
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
                            <form action="{{ Route('job-category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                     <label for="title"> Title <span style="color:red;">*</span></label>
                                     <input type="text" name="name" placeholder="Enter Category Title" class="form-control" required>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary ">Save Job Category</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            <div id="msg">
                                @include('back.layouts.message')
                            </div>
                           <table class="table table-bordered ">
                               <tr>
                                   <th>#REF ID</th>
                                    <th>Title</th>
                                    <th colspan="2">Action</th>
                               </tr>
                                 @foreach ($cats as $cat)
                                  <tr>
                                      <td>{{ $cat->id }}</td>
                                      <td class="p-0">
                                          <input class="table-input" type="text" id="cat-{{$cat->id}}" value="{{ $cat->name }}">
                                        </td>
                                      <td width="50px">
                                          <button data-href="{{ route('job-category.update',$cat->id) }}" data-id="cat-{{$cat->id}}" class="btn btn-sm btn-primary" onclick="update(this);">Update</button>
                                      </td>
                                      <td>
                                          <form action="{{ route('job-category.destroy',$cat->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?');">Delete</button>
                                          </form>
                                      </td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{-- {{ $categories->links() }} --}}
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
@section('scripts')
    <script>
        function update(ele) {
            console.log(ele);
            $.post(ele.dataset.href, {
                "name":$('#'+ele.dataset.id).val(),
                "_method":'PUT',
                "_token":"{{csrf_token()}}"
            },
            function (data, textStatus, jqXHR) {
                if(data.status){
                    $('#msg').html(
                        '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>Job Category Updated Sucessfully</strong></div>'
                    );
                }
            },
            );
        }
    </script>
@endsection
