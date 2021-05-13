@extends('back.layouts.app')
@section('title','Deliveries')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                    @php
                            
                        $arr=['Pending','Completed'];
                    @endphp
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> Delivery List - {{$arr[$type]}} </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <!-- <a href="" class="btn btn-primary">Create New Coupon</a> -->
                                    @for ($i = 0; $i < 2; $i++)
                                        <a class="btn {{$type==$i?'btn-primary':'btn-secondary'}}" href="{{route('admin.delivery',['type'=>$i])}}">{{$arr[$i]}}</a>
                                    @endfor
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                           <table class="table table-bordered ">
                               <tr>
                                    <th>REF ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th></th>
                               </tr>
                                 @foreach ($delivery as $k => $attr)
                                  <tr id="delivery_{{$attr->id}}">
                                      <td>{{ $attr->id }}</td>
                                      <td>{{ $attr->user->name }}</td>
                                      <td>{{ $attr->user->address }}</td>
                                      <td>{{ $attr->user->phone }}</td>
                                      <th>
                                        Posted
                                        {{$attr->created_at->diffForHumans()}}
                                        @if ($attr->status==1)
                                        <hr>
                                        completed 
                                        {{$attr->updated_at->diffForHumans()}}

                                        @endif  
                                        </th>
                                      <td>
                                          <a class="btn btn-primary btm-sm" target="_blank" href="{{route('admin.deliverySingle',['delivery'=>$attr->id])}}">
                                              View Detail
                                          </a>
                                          @if ($attr->status==0)  
                                          <button class="btn btn-secondary pl-2" onclick="complete({{$attr->id}})">Close Order</button>
                                        @endif
                                      </td>
                                  </tr>
                                 @endforeach
                           </table>

                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            {{ $delivery->links() }}
                        </div>
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
