@extends('Need.layout')
@section('content')
    <div class="big_section">
        <div class="title">
           <span class="normal">
               Bike
            </span>
            <span class="other"> Servicing</span>
        </div>
        <div class="desc py-3 text-center">
            {{custom_config('bs_long')->value??""}}
        </div>
        <div class="mx-md-5 mx-0">
            <div class="shadow-md p-md-5 p-2">
                <div class="d-block d-md-flex w-100 py-3 text-center" style="flex-wrap: wrap;">
                    <div style="flex:1;border-radius:0;margin-top:10px;" class="btn btn-secondary">Bike Details</div>
                    <div style="flex:1;border-radius:0;margin-top:10px;border-right:1px white solid;border-left:1px solid white;" class="btn btn-primary">Choose Package</div>
                    <div style="flex:1;border-radius:0;margin-top:10px;" class="btn btn-secondary">CheckOut</div>
                </div>
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
                <form action="{{route('n.front.book.step2')}}" method="POST" enctype="multipart/form-data" onsubmit="return checkData(this);" id="form">
                    @csrf

                    <div class="row m-0">
                        @foreach ($services as $service)
                            <div class="col-md-3 col-6 p-0">
                                <div class="data {{$s!=null?($s==$service->id?'active':''):''}} h-100" id="sc_{{$service->id}}">
                                    <input {{$s!=null?($s==$service->id?'checked':''):''}} type="radio" class="d-none s" name="service" id="s_{{$service->id}}" value="{{$service->id}}" onchange="changeManager(this)">
                                    <label for="s_{{$service->id}}">
                                            <div class="text-center title">
                                                {{$service->title}}
                                            </div>
                                            <div class="text-center desc">
                                                {{$service->desc}}
                                            </div>

                                    </label>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    @foreach ($serviceitems as $key=>$sis)
                        <div id="sic_{{$key}}" class=" {{$s!=null?($s==$key?'':'d-none'):'d-none'}} sic shadow" style="border: 1px solid #0d6efd;">
                            <div class="row m-0">

                                @foreach ($sis as $si)
                                    <div class="col-md-6 " style="padding:5px;" >
                                        <div style="border:  1px solid #0d6efd;padding:10px;">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-inline-block">
                                                    <input {{$siss!=null?(in_array($si->id,$siss)?'checked':''):''}} type="checkbox" name="si[]"  id="si_{{$si->id}}" value="{{$si->id}}" class="si si_{{$si->id}}" >
                                                    <label for="si_{{$si->id}}">{{$si->title}} </label>
                                                </div>
                                                <div class="">
                                                    <label for="si_{{$si->id}}">Rs.{{($si->onsale==1?$si->sale_price:$si->price)+0}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group pb-2 pt-4 d-block d-md-flex justify-content-between">
                        <a class="submit mb-3 mt-md-0" href="{{route('n.front.book.step1')}}"> << Back</a>
                        <span mb-3 mt-md-0>
                            <input type="hidden" name="bp" id="bp" value="0">
                            <span class="submit mb-3 text-right" onclick="buyProducts()">Buy Extra Products >></span>
                            <button class="submit mb-3 text-right" >Checkout >></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/normal.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" /> --}}

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
       if(sil==0){
           alert('Please Select At Least One Service From Selected Package')
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
