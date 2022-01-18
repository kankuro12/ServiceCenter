@extends('back.layouts.app')
@section('title','Single Delivery')
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
                                <h3 class="page-title mr-sm-auto"> Delivery - {{$delivery->id}}  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <button class="btn btn-secondary" id="delivery_{{$delivery->id}}" onclick="complete({{$delivery->id}})">Close Delivery</button>

                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body p-4">

                            <table class="table table-bordered ">
                                <tr>
                                     <th>REF ID</th>
                                     <th>Name</th>
                                     <th>Address</th>
                                     <th>Phone</th>
                                     <th>Posted</th>
                                </tr>
                                   <tr>
                                       <td>{{ $delivery->id }}</td>
                                       <td>{{ $delivery->user->name }}</td>
                                       <td>{{ $delivery->user->address }}</td>
                                       <td>{{ $delivery->user->phone }}</td>
                                       <th>{{$delivery->created_at->diffForHumans()}}</th>
                                   </tr>
                            </table>
                            <div class="list">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Uploaded List</h4>
                                        <div class="p-2">

                                            @if($isimage)
                                                <img src="{{asset($delivery->file)}}" alt="" class="w-100">
                                            @endif
                                                <div class="form-control p-2 d-flex justify-content-between">
                                                    <span>
                                                        {{$info['basename']}}
                                                    </span>
                                                    <a href="{{asset($delivery->file)}}"  target="_blank" class="">Download</a>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-">
                                        <h4>Extra Detail</h4>
                                        <div class="p-2">
                                            {{$delivery->desc}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- /.card-body -->

                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
@section('scripts')
    <script>
        lock=false;
        _id=0;
        token="{{csrf_token()}}";
        function complete(id){
            _id=id;
            console.log(id);
            if(!lock){
                if(confirm('Do You Want To Complete Order?')){
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.deliveryComplete')}}",
                        data: {
                            "id":id,
                            "_token":token
                        },

                        success: function (response) {
                            $('#delivery_'+id).remove();
                            lock=false;
                        }
                    });
                }
            }
        }
    </script>
@endsection
