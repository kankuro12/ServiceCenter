@extends('back.layouts.app')
@section('title', 'Customer List')

@section('content')
    <main class="app-main">
        <style>
            .cc-btn.active {
                background: #007ACC;
                color: white;
            }

            .cc {
                height: 0px !important;
                overflow: hidden;
            }

            .cc.active {
                height: auto !important;
                overflow: visible;
            }

        </style>
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
                                <h3 class="page-title mr-sm-auto"> Detail of {{ $customer->name }} </h3>
                                <!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">

                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="shadow mb-5">
                                <div class="card-body">
                                    <form action="{{route('customer.activate',['id'=>$customer->id])}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="till">Subscription Till</label>
                                                <input type="date" name="till" id="till" min="{{$active?$customer->till:$now}}" value="{{$active?$customer->till:$now}}"  class="form-control">
                                            </div>
                                            <div class="col-md-8 d-flex align-items-end">
                                                <button class="btn btn-primary mx-2">{{$active?'Update Subscription':'Activate'}}</button>
                                                <a href="{{route('customer.deactivate',['id'=>$customer->id])}}" class="btn btn-danger">Deactivate</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="shadow mb-5">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{asset($customer->name)}}" alt="" class="w-100">
                                        </div>
                                        <div class="col-12"></div>

                                        <div class="col-md-3">
                                            <h5>Name</h5>
                                            <div>
                                                {{$customer->name}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Address</h5>
                                            <div>
                                                {{$customer->address}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Phone</h5>
                                            <div>
                                                {{$customer->phone}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Email</h5>
                                            <div>
                                                {{$customer->email}}
                                            </div>
                                        </div>
                                        @if ($customer->role==2)
                                        <div class="col-md-3">
                                            <h5>Status</h5>
                                            <div>
                                                {{$customer->active==1?"Active":'inactive'}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Activated Till</h5>
                                            <div>
                                                {{$active? $customer->till??'' :'inactive'}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Company</h5>
                                            <div>
                                                {{$customer->company}}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h5>Description</h5>
                                            <div>
                                                {!!$customer->desc!!}
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>



                            <hr>
                            <div class="">
                                <button class="btn cc-btn  active" data-id="1">Jobs</button>
                                <button class="btn cc-btn" data-id="2">Deliveries</button>
                                <button class="btn cc-btn" data-id="3">Orders</button>
                            </div>
                            <div class="py-2">
                                <div class="cc cc1">
                                    @include('back.customer.partial.jobs')
                                </div>
                                <div class="cc cc2">
                                    @include('back.customer.partial.delivery')

                                </div>
                                <div class="cc cc3">
                                    @foreach ($orders as $order)
                                        @include('back.customer.partial.orders',['order'=>$order])
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('scripts')
<script>
    function activate(id) {
        $('.cc').removeClass('active');
        $('.cc'+id).addClass('active');
    }
    $(document).ready(function () {
        $('.cc-btn').click(function (e) {
            e.preventDefault();
            $('.cc-btn').removeClass('active');
            $(this).addClass('active');
            activate(this.dataset.id);
        });
        activate(1);
    });
</script>
@endsection
