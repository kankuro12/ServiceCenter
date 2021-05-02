@extends('email.layout')
@section('content')

<div style="margin:100px;text-align:center;">
    <a style="
    padding:20px 50px;
    background:#00b08c;
    font-weight: 800;
    color:white;
    border-radius:5%;
    text-decoration: none;border
    " href="{{url('/change-password?code='.$link)}}">Reset
        Your
        password</a>
</div>
@endsection
