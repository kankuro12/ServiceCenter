@extends('Need.vendor.dashboard.index')
@section('newcontent')
<div class="bg-white shadow">
    @if (!$active)
    <div class="alert alert-danger">
        You Account Is Not Activated. Please Contact Jogaad Team For Activation.
    </div>
    @endif
</div>
@endsection
