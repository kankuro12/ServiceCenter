<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>{{env('APP_NAME',"laravel")}} - {{custom_config('tagline')->value??""}}</title>
    {{-- @laravelPWA --}}

    @include('Need.fav')
    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="/assets/css/animated.css">
    <link rel="stylesheet" href="/assets/css/owl.css">
    @yield('css')
    <style>
        .other{
            color:#05A4ED;
        }
        .normal{
            color:#2C2C2C;
        }

        .header-area{
          background: #ffffff;
        }



        .header-area .main-nav{
          background: #ffffff;

        }
        .background-header{
          background-color: #ffffff !important;
        }
        .header-area .main-nav .nav li {
            padding-right: 0px;
        }

        .header-area .main-nav .nav li a{
          color:#4d4d4d !important;
        }
        .header-area .main-nav .logo {
            line-height: 80px;
        }
        .header-area .main-nav .logo img{
            max-height: 60px;
        }
        .widget{
            min-height: 150px;
        }

        .widget-title{
            font-size: 20px;
            color:white;
        }

        .widget-list{
            font-size: 15px;
            text-decoration: none;
            color: inherit;
            color:white;

        }
        .widget-list a{
            color: inherit;
        }

        .text-black{
            color: #2C2C2C;
        }

        .social-icons{
            text-align: center;
        }
        .social-icons a{
            height: 50px;
            width: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: white;
            color: #FF3449;
            font-size: 25px;
            border-radius: 50%;
            margin:0px 5px;
        }
        @media(max-width:425px){

            .header-area .main-nav .nav li a{
              color:#2c2c2c !important;
            }

        }
    </style>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  {{-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> --}}
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown shadow" data-wow-duration="0.75s" data-wow-delay="0s" >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{route('n.front.home')}}" class="logo">
              <img style="max-width: 125px" src="{{asset(custom_config('logo')->value??'')}}" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{route('n.front.home')}}" class="{{Route::is('n.front.home')?'active':''}}">Home</a></li>
              <li class="scroll-to-section"><a href="{{route('n.front.all-category')}}" class="{{Route::is('n.front.all-category')?'active':''}}">Jobs</a></li>
              <li class="scroll-to-section"><a href="{{route('n.front.book.step1')}}" class="{{Route::is('n.front.book.step1')?'active':''}}">Bike Service</a></li>
              {{-- <li class="scroll-to-section"><a href="#services">Services</a></li> --}}
              <li class="scroll-to-section"><a href="{{route('n.front.delivery')}}" class="{{Route::is('n.front.delivery')?'active':''}}">Delivery</a></li>
              {{-- <li class="scroll-to-section"><a href="{{route('n.front.postcv')}}" class="{{Route::is('n.front.postcv')?'active':''}}">Find Job</a></li> --}}
              {{-- <li class="scroll-to-section"><a href="{{route('n.front.postjob')}}" class="{{Route::is('n.front.postjob')?'active':''}}">Post Job</a></li> --}}
              <li class="scroll-to-section"><a href="{{route('n.front.book.shop')}}" class="{{Route::is('n.front.book.shop')?'active':''}}">Shop</a></li>
              <li class="scroll-to-section"><a href="{{route('n.front.subs')}}" class="{{Route::is('n.front.subs')?'active':''}}">Subcription</a></li>
              @if (Auth::check())
                <li class="scroll-to-section"><a href="{{route('n.front.user')}}" class="{{Route::is('n.front.user')?'active':''}}">My Account</a></li>
              @else
                <li class="scroll-to-section"><a href="{{route('n.front.auth')}}" class="{{Route::is('n.front.auth')?'active':''}}">Login</a></li>

              @endif
              {{-- <li class="scroll-to-section"><a href="#contact">Message Us</a></li> --}}
              <li class="scroll-to-section"><div class="main-red-button"><a href="tel:{{custom_config('phone')->value??""}}
                ">{{custom_config('phone')->value??""}}</a></div></li>
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  @yield('content')


  @include('Need.footer')
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>??{{env('APP_NAME','')}}.

          <br>Design: <a rel="nofollow" target="_blank" href="https://needtechnosoft.com.np">Need Technosoft</a></p>
          <br>
        </div>
      </div>
    </div>
  </footer>

  @include('Need.sucess')
  <style>

  </style>

  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/owl-carousel.js"></script>
  <script src="/assets/js/animation.js"></script>
  <script src="/assets/js/imagesloaded.js"></script>
  <script src="/assets/js/templatemo-custom.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  @yield('js')
  <script>
    $(document).ready( function() { // Wait until document is fully parsed
      $("#contact").on('submit', function(e){

        e.preventDefault();
        var fd=new FormData(document.getElementById('contact'));
        $.ajax({
          type: "POST",
          url: "{{route('n.front.message')}}",
          data:fd,
          processData: false,
          contentType: false,
          success: function (response) {
              $('#sucessModal').modal('show');
              document.getElementById('contact').reset();
          }
        });
      });
    });

  </script>

  @if (!env('APP_DEBUG',false))

  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v10.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <!-- Your Chat Plugin code -->
  <div class="fb-customerchat"
    attribution="biz_inbox"
    page_id="106889871585800">
  </div>
  @endif
  <!-- Messenger Chat Plugin Code -->
</body>
</html>
