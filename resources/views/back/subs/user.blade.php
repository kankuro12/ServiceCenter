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
                        @php
                            $arr=['Pending','Current','Expired'];
                        @endphp
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto"> User Subscriptions - {{$arr[$type]}} </h3><!-- .btn-toolbar -->
                                {{-- <h3 class="page-title mr-sm-auto"> List Of Slider </h3><!-- .btn-toolbar --> --}}
                                <div class="dt-buttons btn-group">
                                    @for ($i = 0; $i < 3; $i++)
                                        <a class="btn {{$type==$i?'btn-primary':'btn-secondary'}}" href="{{route('admin.subs.user',['type'=>$i])}}">{{$arr[$i]}}</a>
                                    @endfor
                                    {{-- <button class="btn btn-primary">Create New </button> --}}
                                </div><!-- /.btn-toolbar -->
                            </div>
                            <hr>
                         
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                            @include('back.layouts.message')
                            
                        </div><!-- /.card-body -->
                        <div class="d-flex justify-content-center">
                            <table class="table">
                                <tr>
                                    <th>
                                        RefID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Phone
                                    </th>
                                    <th>
                                        Package
                                    </th>
                                    <th>
                                        valid Till
                                    </th>
                                    <th>
                                        Options
                                    </th>
                                </tr>
                                @foreach ($subs as $sub)
                                    <tr id="sub_{{$sub->id}}">
                                        <td>
                                            {{$sub->id}}
                                        </td>
                                        <td>
                                            {{$sub->user->name}}
                                        </td>
                                        <td>
                                            {{$sub->user->phone}}
                                        </td>
                                        <td>
                                            {{$sub->sub->title}}
                                        </td>
                                        <td>
                                            {{$sub->validtill}}
                                        </td>
                                        <td>
                                            @if ($sub->accecpt==0)
                                                <button class="btn btn-primary mr-2"  onclick="accecpt({{$sub->id}})">Accecpt</button>
                                                <button class="btn btn-danger" onclick="del({{$sub->id}})">Del</button>
                                            
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
            </div>
          </div>
        </div>
</main>


<div class="modal fade" id="accecptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <form id="accecpt" method="post">
              <label for="">Valid Till</label>
              <input type="date" name="validtill" id="validtill">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="save()">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>
        lock=false;
        _id=0;
        token="{{csrf_token()}}";
        function accecpt(id){
            _id=id;
            console.log(id);
            if(!lock){
               
            $('#accecptModal').modal('show');
            }
        }

        function save(){
            if(!lock){
                lock=true;
                var valueDate = document.getElementById('validtill').value;

                if(!Date.parse(valueDate)){
                    alert('date is invalid');
                    return;
                }
                if(confirm('Do You Want To Accept Subscription Request')){
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.subs.user-accecpt')}}",
                        data: {
                            "id":_id,
                            "_token":token,
                            "validtill":document.getElementById('validtill').value
                        },
                    
                        success: function (response) {
                            $('#sub_'+_id).remove();
                            $('#accecptModal').modal('hide');
                            document.getElementById('accecpt').reset();
                            lock=false;
                        }
                    });
                }
            }
        }
        function del(id){
            if(!lock){
                lock=true;
                if(confirm('Do You Want To Delete Subscription Request')){
                    $.ajax({
                        type: "POST",
                        url: "{{route('admin.subs.user-del')}}",
                        data: {
                            "id":id,
                            "_token":token
                        },
                    
                        success: function (response) {
                            $('#sub_'+id).remove();
                            lock=false;
                        }
                    });
                }
            }
        }
    </script>
@endsection