@extends('Need.vendor.dashboard.index')
@section('newcss')

@endsection
@section('jumbo')
    <span>Profile</span>
@endsection
@section('buttons')
@endsection
@section('newtitle', 'Profile')

@section('newcontent')

    <div class="shadow profile">
        <div class="card-body">
            <div class="form-wrapper wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                @if (Session::has('msg_signup'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3 text-center" role="alert">
                        {{ Session::get('msg_signup') }}
                    </div>
                @endif
                <form action="{{ route('n.front.vendor.manage-profile') }}" id="update" class="pb-5" method="POST"
                    autocomplete="off">
                    @csrf

                    <input type="hidden" name="type" id="type" class="type">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" name="name" id="name" placeholder="Name" required minlength="3"
                                    value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" >Email <span class="email-check text-danger ms-2"></span></label>
                                <input type="email" name="email" placeholder="Email Address" id="semail" required
                                    value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Phone<span class="phone-check text-danger ms-2"></span></label>
                                <input type="number" name="phone" minlength="10" maxlength="10" id="sphone"
                                    placeholder="Phone" required value="{{ $user->phone }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" placeholder="Address" required
                                    value="{{ $user->address }}">
                            </div>
                        </div>

                        @if ($user->role==2)

                        <div id="is_provider" style="">
                            <div class="form-group">
                                <label for="company">Company / Organization </label>
                                <input type="text" name="company" id="company" placeholder="Company / Organization"
                                    minlength="3" value="{{$user->company}}" value="" {{$user->role==2?'required':''}}>
                            </div>
                            <div class="form-group">
                                <label for="desc">Company / Organization Description</label>
                                <textarea type="text" name="desc" id="desc" placeholder="Company / Organization Description"
                                    value="" {{$user->role==2?'required':''}}>{{$user->desc}}</textarea>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="form-group text-center py-2">
                        <button class="submit">Update Profile</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('includejs')

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@if ($user->role==2)

<script src="https://cdn.tiny.cloud/1/4adq2v7ufdcmebl96o9o9ga7ytomlez18tqixm9cbo46i9dn/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
@endif
@endsection
@section('newjs')
<script>
    var state = 1;

    function isCompany(ele) {
        $(selector).attr(attributeName);
    }



    $(function() {

        $('.header>span').click(function(e) {
            e.preventDefault();
            $('#type').val($(this).data('type'));
            console.log($(this).data('type'));
            $('.header>span').removeClass('active');
            $(this).addClass('active');
        });

        $('#update').submit(function(e) {
            e.preventDefault();
            axios.post(this.action,(new FormData(this)))
            .then((res)=>{
                alert('Data Updated Successfully');
                $('#name-input').val($('#name').val());
            })
            .catch((err)=>{
                alert('err.response.data.message');
            })
        });
        @if ($user->role==2)

        if (window.innerWidth > 768) {

            tinymce.init({
                selector: '#desc',
                plugins: [
                    '  advlist anchor autolink codesample fullscreen help image imagetools tinydrive',
                    ' lists link media noneditable  preview',
                    ' searchreplace table template  visualblocks wordcount'
                ],
                toolbar_mode: 'floating',
            });
        } else {
            $('#desc').addClass('form-control');
            $('#desc').css('height', '300px');
        }
        @endif
    });
</script>
@endsection
