@extends('Need.layout')
@section('content')

    <div class="login">
        <div class="form signup shadow">
            <h5>
                <span class="normal">New To Our Site </span>
                <br>
                <span class="normal"> Create New </span>
                <span class="other">Account. </span>
            </h5>

            <div class="form-wrapper wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                @if (Session::has('msg_signup'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3 text-center" role="alert">
                        {{ Session::get('msg_signup') }}
                    </div>
                @endif
                <form action="{{ route('n.front.signup') }}" id="signup" class="pb-5" method="POST" autocomplete="off">
                    @csrf
                    {{-- <div class="header shadow">
                        <span class="active" data-type="1">
                            Signup as Job Searcher
                        </span>
                        <span data-type="2">
                            Signup as Job Provider
                        </span>
                    </div> --}}
                    <input type="hidden" name="type" id="type" class="type">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" name="name" placeholder="Name" required minlength="3"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Email <span class="email-check text-danger ms-2"></span></label>
                                <input type="email" name="email" placeholder="Email Address" id="semail" required
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Phone<span class="phone-check text-danger ms-2"></span></label>
                                <input type="number" name="phone" minlength="10" maxlength="10" id="sphone" placeholder="Phone" required
                                    value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" placeholder="Address" required value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" placeholder="Password" id="password" required minlength="6" value="">
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group ">
                                <label for="confirm_password">Retype  Password </label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Password" required minlength="6" value="">
                                <span class="password-check text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <div class="dotted"></div> --}}
                            <div class="d-flex align-items-center pb-2">
                                <input type="checkbox" onchange="$('#is_provider').css('display',this.checked?'block':'none');" name="provider" id="provider" class="me-2"><label for="provider">Signup as Job Provider</label>
                            </div>
                        </div>
                        <div id="is_provider" style="display: none;">
                            <div class="form-group">
                                <label for="company">Company / Organization </label>
                                <input type="text" name="company" id="company" placeholder="Company / Organization" required minlength="3" value="">
                            </div>
                            <div class="form-group">
                                <label for="desc">Company / Organization Description</label>
                                <textarea type="text" name="desc" id="desc" placeholder="Company / Organization Description"  required value=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="submit">Create Account</button>
                    </div>
                </form>
                <hr>
                    <div class="text-center">
                        <a href="{{route('n.front.login')}}" class="another">
                            Already have a Account? <span class="link">Signin</span>
                        </a>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection
@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        var state=1;
        function checkEmail() {
            axios.post('{{route('n.front.check')}}',{
                'email':$('#semail').val(),
                'phone':$('#sphone').val(),
            })
            .then((res)=>{
                state=2;
                if(!res.data.email){
                    $('.email-check').html("Email Already in Use.");
                    state=1;
                }
                if(!res.data.phone){
                    $('.phone-check').html("Phone Already in use.");
                    state=1;

                }
                if(state==2){
                    $('#signup')[0].submit();
                }
            });
        }
        $(function () {
            $('.header>span').click(function (e) {
                e.preventDefault();
                $('#type').val($(this).data('type'));
                console.log($(this).data('type'));
                $('.header>span').removeClass('active');
                $(this).addClass('active');
            });

            $('#signup').submit(function (e) {
                if(state==1){
                    e.preventDefault();
                }
                $('.password-check').html("");
                $('.email-check').html("");
                $('.phone-check').html("");
                console.log($('#password').val(),$('#confirm_password').val());
                if($('#password').val() != $('#confirm_password').val()){
                    $('.password-check').html("Please Confirm Password");
                }else{
                    checkEmail();
                }

            });
        });
    </script>
@endsection
