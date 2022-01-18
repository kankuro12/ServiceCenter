@extends('Need.vendor.dashboard.index')
@section('newcontent')
<div class="bg-white shadow">
    <style>
        .summary{
            text-align: center;
            margin-bottom: 15px;
        }
        .summary .material-icons{
            font-size: 40px;
        }
        .summary .shadow{
            background: white;
        }
    </style>
    @if (!$active)
    <div class="alert alert-danger">
        You Account Is Not Activated. Please Contact Jogaad Team For Activation. Your Reference ID is #{{$user->id}}
    </div>
    @endif

</div>
<div class="row">
    @if ($user->role==2)
    <div class="col-md-4 summary">
        <div class="shadow card-body">
            <span class="material-icons">
                work_outline
            </span>
            <div>
                {{$count->jp}}
            </div>
            <div>
                Posted Job
            </div>
        </div>
    </div>
    @else
    <div class="col-md-4 summary">
        <div class="shadow card-body">
            <span class="material-icons">
                work_outline
            </span>
            <div>
                {{$count->aj}}
            </div>
            <div>
                Job Application
            </div>
        </div>
    </div>

    @endif
    <div class="col-md-4 summary">
        <div class="shadow card-body">
            <span class="material-icons">
                list_alt
            </span>
            <div>
                {{$count->so}}
            </div>
            <div>
                Orders
            </div>
        </div>
    </div>
    <div class="col-md-4 summary">
        <div class="shadow card-body">
            <span class="material-icons">
                delivery_dining
            </span>
            <div>
                {{$count->d}}
            </div>
            <div>
                Deliveries
            </div>
        </div>
    </div>
</div>
@endsection
