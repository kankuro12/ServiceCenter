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
          background: #001034;
        }
        
       

        .header-area .main-nav{
          background: #001034;

        }
        .background-header{
          background-color: #001034 !important;
        }

        .header-area .main-nav .nav li a{
          color:white !important;
        }

        .background-header .main-nav .menu-trigger span, .background-header .main-nav .menu-trigger span:before, .background-header .main-nav .menu-trigger span:after {
          background-color:white;
        }

        .header-area .main-nav .menu-trigger span, .header-area .main-nav .menu-trigger span:before, .header-area .main-nav .menu-trigger span:after {
          background-color:white;
        }

        .background-header .main-nav .menu-trigger.active span:before {
          background-color:white;

        }
        .background-header .main-nav .menu-trigger.active span:after {
          background-color:white;

        }
        .header-area .main-nav .menu-trigger.active span:before {
          background:white;
        }
        .header-area .main-nav .menu-trigger.active span:after {
          background:white;
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
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
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
              <li class="scroll-to-section"><a href="{{route('n.front.book.step1')}}" class="{{Route::is('n.front.book.step1')?'active':''}}">Bike Service</a></li>
              {{-- <li class="scroll-to-section"><a href="#services">Services</a></li> --}}
              <li class="scroll-to-section"><a href="{{route('n.front.delivery')}}" class="{{Route::is('n.front.delivery')?'active':''}}">Delivery</a></li>
              <li class="scroll-to-section"><a href="{{route('n.front.postcv')}}" class="{{Route::is('n.front.postcv')?'active':''}}">Find Job</a></li>
              <li class="scroll-to-section"><a href="{{route('n.front.postjob')}}" class="{{Route::is('n.front.postjob')?'active':''}}">Post Job</a></li>
              <li class="scroll-to-section"><a href="{{route('n.front.book.shop')}}" class="{{Route::is('n.front.book.shop')?'active':''}}">Shop</a></li>
              @if (Auth::check())
                <li class="scroll-to-section"><a href="{{route('n.front.user')}}" class="{{Route::is('n.front.user')?'active':''}}">Account</a></li>
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

  <div id="" class="contact-us section">
    <div class="container">
      <a name="bf"></a>
      <div class="row">
        
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Feel Free To Send Us a Message About Your Need</h2>
            <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="tel:{{custom_config('phone')->value??""}}">{{custom_config('phone')->value??""}}</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact"  >
            @csrf
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="text" name="phone" id="phone" placeholder="phone" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea maxlength="160" name="message" type="text" class="form-control" id="message" placeholder="Message" required></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit btn btn-primary" class="main-button ">Send Message</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="assets/images/contact-decoration.png" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>©{{env('APP_NAME','')}}.

          <br>Design: <a rel="nofollow" href="https://needtechnsoft.com.np">Need Technosoft</a></p>
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

  <!-- Messenger Chat Plugin Code -->
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
</body>
</html>
