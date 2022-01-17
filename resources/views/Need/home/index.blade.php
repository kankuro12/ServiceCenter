@extends('Need.layout')
@section('content')
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <h6>Welcome to {{ env('APP_NAME') }}</h6>
                                <h2>{{ custom_config('banner_msg1')->value ?? '' }}</h2>
                                <p>{{ custom_config('banner_msg2')->value ?? '' }}</p>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset(custom_config('banner_image')->value ?? '') }}" alt="team meeting"
                                    class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="section">
        <div class="row m-0">
            {{-- <div class="col-md-6 p-0"> --}}
                <div class="work">
                    <div class="section-inner ">
                        <div class="section-title">
                            Work
                        </div>
                        <div class="section-desc">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam similique itaque doloribus incidunt expedita perspiciatis ad non, dolorum accusantium reprehenderit quam facilis nostrum eaque cum ipsam inventore vel, sint dicta!
                        </div>
                        <a href="{{route('n.front.all-category')}}" class="section-btn">
                            Visit
                        </a>
                    </div>
                </div>
            {{-- </div> --}}
            {{-- <div class="col-md-6 p-0"> --}}
                <div class="ride">
                    <div class="section-inner ">
                        <div class="section-title">
                            Ride
                        </div>
                        <div class="section-desc">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam similique itaque doloribus incidunt expedita perspiciatis ad non, dolorum accusantium reprehenderit quam facilis nostrum eaque cum ipsam inventore vel, sint dicta!
                        </div>
                        <a class="section-btn" href="{{route('n.front.book.step1')}}">
                            Visit
                        </a>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
    @include('Need.home.category')
    {{-- @include('Need.home.carousel') --}}
    {{-- <div class="services" id="service">
    <div class="title">
        <span class="normal"> Our </span><span class="other"> Services </span>
    </div>
    <div class="row">


        <div class="col-md-3">
          <div class="item">
            <div>
              <img src="{{asset(custom_config('bs_image')->value??"")}}" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Bike Servicing
                </div>
                <div class="item-desc">
                  {{custom_config('bs_short')->value??""}}
                </div>
                <div class="text-center pt-4">
                    <a href="{{route('n.front.book.step1')}}" class="item-btn">Book Now</a>
                </div>
            </div>

          </div>
        </div>

        <div class="col-md-3">
          <div class="item">
            <div>
              <img src="{{asset(custom_config('hd_image')->value??"")}}" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Home Delivery
                </div>
                <div class="item-desc">
                  {{custom_config('hd_short')->value??""}}
                </div>
                <div class="text-center pt-4">
                    <a href="{{route('n.front.delivery')}}" class="item-btn">Request Now</a>
                </div>
            </div>

          </div>
        </div>

        <div class="col-md-3">
          <div class="item">
            <div>
              <img src="{{asset(custom_config('fj_image')->value??"")}}" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Find Job
                </div>
                <div class="item-desc">
                  {{custom_config('fj_short')->value??""}}
                </div>
                <div class="text-center pt-4">
                    <a href="{{route('n.front.postcv')}}" class="item-btn">Start Now</a>
                </div>
            </div>

          </div>
        </div>

        <div class="col-md-3">
          <div class="item">
            <div>
              <img src="{{asset(custom_config('pj_image')->value??"")}}" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Post A Job
                </div>
                <div class="item-desc">
                  {{custom_config('pj_short')->value??""}}
                </div>
                <div class="text-center pt-4">
                    <a href="{{route('n.front.postjob')}}" class="item-btn">Start Now</a>
                </div>
            </div>

          </div>
        </div>

        <div class="col-md-3">
          <div class="item">
            <div>
              <img src="{{asset(custom_config('subs_image')->value??"")}}" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Subscription Packages
                </div>
                <div class="item-desc">
                  {{custom_config('subs_short')->value??""}}
                </div>
                <div class="text-center pt-4">
                    <a href="{{route('n.front.subs')}}" class="item-btn">Subscribe Now</a>
                </div>
            </div>

          </div>
        </div>

    </div>
  </div> --}}
@include('Need.home.popup')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets\css\front.css') }}">
    <style>
        #popup .modal-content{
            border: none;
            border-radius: 0px;
        }
        /* .main-banner {
            padding: 125px 50px 0px 50px;
        }
        @media (max-width:426px){
            .main-banner {
            padding: 125px 0px 0px 0px;
        }

        } */
    </style>
@endsection
@section('js')
    <script>
         var cats={!! json_encode($cats) !!};
        const catele=document.getElementById('cats');
        const jobele=document.getElementById('job-container');
                $('#slid').owlCarousel({
            rtl: true,
            loop: true,
            margin: 10,
            autoplay: true,
            nav: true,
            items: 1
        })
        $(document).ready(function () {
            let ismobile=window.innerWidth <426;
            let url="{{route('n.front.view-job',['job'=>'xxx_id'])}}";
            let caturl="{{route('n.front.job-category',['cat'=>'xxx_id'])}}";
            if(ismobile){
                cats.forEach(cat => {
                    catele.innerHTML+='<li class="single-cat" id="single-cat-'+cat.i+'" data-id="'+cat.i+'" data-name="'+cat.n+'">'+
                    '<a href="'+(caturl.replace('xxx_id',cat.i))+'">'+ cat.n+'</a>'+
                    '</li>';

                });
            }else{
                cats.forEach(cat => {
                    catele.innerHTML+='<li class="single-cat" id="single-cat-'+cat.i+'" data-id="'+cat.i+'" data-name="'+cat.n+'">'+cat.n+'</li>';
                    html='<div class="row d-none cat" id="cats-'+cat.i+'">';
                        cat.j.forEach(job => {
                            let d=job.sdata.split("|");
                            html+='<div class="col-md-4  " id="cat-'+d[0]+'">'+
                            '<a href="'+(url.replace('xxx_id',d[0]))+'" class="single-cat-view  ">'+
                            '<div class="job-name nowrap">'+d[1]+'</div>'+
                            '<div class="job-company nowrap">'+d[3]+'</div>'+
                            '<div class="job-duedate"> <span>Due Date</span><span>'+d[2]+'</span></div>'+
                            '</a>'+
                            '</div>';
                        });
                    html+= "<div class='py-2'><a class='btn btn-primary' href='"+(caturl.replace('xxx_id',cat.i))+"'>View More In "+cat.n+"</a></div></div>";
                    // console.log(html);
                    jobele.innerHTML+=html;
                });
                $('.single-cat').click(function (e) {
                    e.preventDefault();
                    activate(this.dataset.id,this.dataset.name);
                });
                activate(cats[0].i,cats[0].n);

            }

            $('#popup').modal('show');
        });
            function activate(id,name){
                $('.cat').addClass('d-none');
                $('#cats-'+id).removeClass('d-none');
                $('.single-cat').removeClass('active');
                $('#single-cat-'+id).addClass('active');
                $('#job-category-name').html(name);
            }
    </script>

@endsection
