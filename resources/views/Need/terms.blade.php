@extends('Need.layout')
@section('content')

@php
$info = \App\Termsinfo::where('id',1)->first();
@endphp
<div class="container">
    <h5 class="text-center" style="padding-top:150px;">
        Terms and Conditions
    </h5>
    <hr>
    <div class="mb-5">
        {!! $info->terms !!}
    </div>
</div>

@endsection
@section('css')
@endsection
