@extends('Need.layout')
@section('content')

    <div class="login">
        <div class="row m-0 shadow">
            <div class="col-md-7 p-0">
                <img class="w-100" src="https://images.unsplash.com/photo-1453728013993-6d66e9c9123a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dmlld3xlbnwwfHwwfHw%3D&w=1000&q=80" alt="">
            </div>
            <div class="col-md-5 p-0">
                <div class="form">
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
                            <div class="d-flex justify-content-between">
                                <span class="btn">
                                    <input type="checkbox" name="me" id="me"> <label for="me">Remember Me</label>
                                </span>
                                <a href="" class="btn btn-link">Forgot Password?</a>
                            </div>
                            <div class="form-group text-center">
                                <button class="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="{{route('n.front.signup')}}" class="another">
                            Don't have a Account? <span class="link">Create Account</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@endsection
