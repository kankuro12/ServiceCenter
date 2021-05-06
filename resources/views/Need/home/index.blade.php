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
                <h2>We Make <em>Repairing </em> &amp; <span>Easily</span> Available</h2>
                <p>Nepal Auto Provides you with professional Repairing services Near You.</p>
                <form id="search" action="#" method="GET">
                  <fieldset>
                    <input type="address" name="address" class="email" placeholder="Search Location" autocomplete="on" required>
                  </fieldset>
                  <fieldset>
                    <button type="submit" class="main-button">Search Location</button>
                  </fieldset>
                </form>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/banner-right-image.png" alt="team meeting" class="w-100">
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
              <img src="https://www.vectorkhazana.com/assets/images/products/Plumber_handyma.jpg" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Bike Servicing
                </div>
                <div class="item-desc">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
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
              <img src="https://www.vectorkhazana.com/assets/images/products/Plumber_handyma.jpg" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Home Delivery
                </div>
                <div class="item-desc">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
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
              <img src="https://www.vectorkhazana.com/assets/images/products/Plumber_handyma.jpg" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Find Job
                </div>
                <div class="item-desc">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
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
              <img src="https://www.vectorkhazana.com/assets/images/products/Plumber_handyma.jpg" alt="" class="w-100">
            </div>
            <div class="desc">
                <div class="item-title other">
                  Post A Job
                </div>
                <div class="item-desc">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
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
 