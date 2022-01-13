@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="title">
           <span class="normal">
               Subscribe
            </span>
            <span class="other"> A PAckage</span>
        </div>
        <div class="desc py-3 text-center">
            {{custom_config('subs_long')->value??""}}
        </div>
        <div class="mx-md-5 mx-0">
            <div class="shadow-md p-md-5 p-2">

                <style>
                    .data{
                        background:white;
                        color:#0D6EFD;
                        /* border-radius:5px; */
                        box-shadow:0px 0px 10px 0px rgba(0,0,0,0.15);
                    }

                    .data.active{
                        background:#0D6EFD;
                        color:white;
                    }

                    .data label{
                        width:100%;
                        font-weight:600;
                        padding:10px 15px;
                        -webkit-user-select: none;  /* Chrome all / Safari all */
                        -moz-user-select: none;     /* Firefox all */
                        -ms-user-select: none;      /* IE 10+ */
                        user-select: none;
                        cursor: pointer;
                    }
                    .data label .title{
                        width:100%;
                        font-size:1.1rem;
                    }
                </style>
                <form action="{{route('n.front.subs')}}" method="POST" enctype="multipart/form-data" onsubmit="return checkData(this);" id="form">
                    @csrf

                    <div class="row m-0">
                        @foreach ($subs as $service)
                            <div class="col-md-3  p-0">
                                <div class="data " id="sc_{{$service->id}}">
                                    <input  type="radio" class="d-none s" name="service" id="s_{{$service->id}}" value="{{$service->id}}" onchange="changeManager(this)">
                                    <label for="s_{{$service->id}}">
                                            <div class="text-center title">
                                                {{$service->title}}

                                            </div>

                                            <div class="text-center desc">
                                                <hr class="my-1">
                                                Rs. {{$service->price}}
                                                <hr class="my-1">

                                                {{$service->desc}}
                                            </div>

                                    </label>

                                </div>

                            </div>
                        @endforeach

                    </div>


                    <div class="form-group py-4">
                        <button class="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
    function changeManager(ele){
        $('.data').removeClass('active');
        $('.sic ').addClass('d-none');
        $('.si').each(function( index ) {
            console.log( index + ": " + $( this ).val() );
            this.checked=false;
        });
        if(ele.checked){
            $('#sc_'+ele.value).addClass('active');
            $('#sic_'+ele.value).removeClass('d-none');
        }
    }

    function checkData(form){
       var sil= $('.si:checked').length;

       var sl= $('.s:checked').length;
       if(sl==0){
           alert('Please Select A Package');
           return false;
       }
        return true;

    }

    function buyProducts(){
        if(checkData(document.getElementById('form'))){

            $('#bp').val("1");
            document.getElementById('form').submit();
        }else{
            $('#bp').val("1");

        }
    }
</script>

@endsection
