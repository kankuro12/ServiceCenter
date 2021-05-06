@extends('Need.layout')
@section('content')
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Welcome to Nepal Auto</h6>
                <h2>{{custom_config('banner_msg1')->value??""}}</h2>
                <p>{{custom_config('banner_msg2')->value??""}}</p>
              
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset(custom_config('banner_image')->value??"")}}" alt="team meeting" class="w-100">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="services" id="service">
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
    
    </div>
  </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets\css\front.css')}}">
@endsection
 