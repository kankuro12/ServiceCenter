@extends('back.layouts.app')
@section('title','Customer List')
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
                                <h3 class="page-title mr-sm-auto"> List Of Customers  </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <button class="btn btn-primary cc-btn " data-id="1">
                                        Normal User
                                    </button>
                                    <button class="btn btn-secondary cc-btn " data-id="2">
                                        Job Providers
                                    </button>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->

                        @include('back.layouts.message')
                        <div class="card-body cc cc1 d-none" >
                            @if (isset($customers['3']))

                            <table class="table table-bordered " id="normal-user">
                                <thead>
                                    <tr>
                                         <th>S.N</th>
                                         {{-- <th>Image</th> --}}
                                         <th>Name</th>
                                         <th>Address</th>
                                         <th>Telephone</th>
                                         <th>Email</th>
                                         <th></th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($customers['3'] as $k => $attr)
                                     <tr>
                                         <td>{{ $k+1 }}</td>
                                         {{-- <td class="text-center"><img src="{{ asset('front/images/customers/'.$attr->image)}}" alt="image" style="height:70px; width:70px; border-radius: 50%;"></td> --}}
                                         <td>{{ $attr->name }}</td>
                                         <td>{{ $attr->address }}</td>
                                         <td>{{ $attr->phone }}</td>
                                         <td>{{ $attr->email }}</td>
                                         <td>
                                             Details
                                         </td>
                                     </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif

                        </div><!-- /.card-body -->
                        <div class="card-body cc cc2 d-none">
                            @if (isset($customers['2']))

                           <table class="table table-bordered " id="job-provider">
                               <thead>
                                   <tr>
                                        <th>REF ID</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Address</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th></th>

                                   </tr>

                               </thead>
                               <tbody>

                                   @foreach ($customers['2'] as $k => $attr)
                                   @php
                                       if($attr->list==null){
                                           $active=false;
                                       }else{
                                           $active= $attr->status==1 && $current->lte($attr->lastdate);
                                       }
                                   @endphp
                                    <tr>
                                        <td>#{{ $attr->id }}</td>
                                        {{-- <td class="text-center"><img src="{{ asset('front/images/customers/'.$attr->image)}}" alt="image" style="height:70px; width:70px; border-radius: 50%;"></td> --}}
                                        <td>{{ $attr->name }}</td>
                                        <td>{{ $attr->company }}</td>
                                        <td>{{ $attr->address }}</td>
                                        <td>{{ $attr->phone }}</td>
                                        <td>{{ $attr->email }}</td>
                                        <td class="text-{{$active?'success':'danger'}}">{{ $active?'active':'inactive' }}</td>
                                        <td>
                                            <a href="{{route('customer.single',['id'=>$attr->id])}}">Detail</a>
                                        </td>
                                    </tr>
                                   @endforeach
                               </tbody>
                           </table>
                           @endif

                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>

@endsection
@section('scripts')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script >
        $(function () {
            $('#normal-user').DataTable();
            $('#job-provider').DataTable();
            $('.cc-btn').click(function (e) {
                e.preventDefault();
                $('.cc').addClass('d-none');
                $('.cc-btn').removeClass('btn-primary');
                $('.cc-btn').removeClass('btn-secondary');
                $('.cc-btn').addClass('btn-secondary');
                $(this).removeClass('btn-secondary');
                $(this).addClass('btn-primary');

                $('.cc'+this.dataset.id).removeClass('d-none');
            });
            $('.cc1').removeClass('d-none');
        });
    </script>
@endsection
