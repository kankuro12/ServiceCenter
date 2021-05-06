@extends('Need.layout')
@section('content')
    
    <div class="login">
       

        <div class="row">
            <div class="col-md-6 order-md-1 form">
                <h5>
                    <span class="normal"> Already Have A </span>
                    <span class="other">  Account </span>
                    <br>
                    <span class="normal">
                        Login.
                    </span>
                </h5>
                <div class="form-wrapper wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    @if(Session::has('msg_login'))
                        <div class="alert alert-danger alert-dismissible fade show mb-3 text-center" role="alert">
                            {{ Session::get('msg_login') }}
                        </div>
                    @endif
                    <form action="{{route('n.front.login')}}" method="POST" autocomplete="off" >
                        @csrf
                        <div class="form-group">
                            {{-- <label for="name">Name</label> --}}
                            <input type="number" name="phone" placeholder="Phone" required value="{{old('phone')}}">
                        </div>
                        <div class="form-group">
                            {{-- <label for="name">Name</label> --}}
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group text-center">
                            <button class="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 order-md-0 form signup">
                <h5>
                    <span class="normal">New To Our Site </span>
                    <br> 
                    <span class="normal"> Create New </span>
                    <span class="other">Account. </span> 
                </h5>
               
                <div class="form-wrapper wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    @if(Session::has('msg_signup'))
                        <div class="alert alert-danger alert-dismissible fade show mb-3 text-center" role="alert">
                            {{ Session::get('msg_signup') }}
                        </div>
                    @endif
                    <form action="{{route('n.front.signup')}}" method="POST" autocomplete="off" >
                        @csrf
                        <div class="form-group">
                            {{-- <label for="name">Name</label> --}}
                            <input type="text" name="name" placeholder="Name" required minlength="3" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            {{-- <label for="name">Name</label> --}}
                            <input type="text" name="address" placeholder="Address" required value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            {{-- <label for="name">Name</label> --}}
                            <input type="number" name="phone" placeholder="Phone" required minlength="10" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            {{-- <label for="name">Name</label> --}}
                            <input type="password" name="password" placeholder="Password" required minlength="6" value="">
                        </div>
                        <div class="form-group text-center">
                            <button class="submit">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@endsection
 