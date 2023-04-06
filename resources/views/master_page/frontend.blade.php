<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- ajax meta start here --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- ajax meta end here --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>{{env('APP_NAME')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    {{--product_detail css code start here  --}}
    <link href="{{asset('frontend')}}/vendor/product-details/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/vendor/product-details/css/css.css" rel="stylesheet">
    {{--product_detail css code end here  --}}

    {{--customer css code start here  --}}
    <link rel="stylesheet" href="{{asset('frontend')}}/css/customer_login_register.css">
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="{{asset('frontend')}}/css/customer_login_register_fronts.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/checkout_custome.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/css/customer_dashboard.css" rel="stylesheet">
    {{--customer css code end here  --}}

    {{--select2-plugin css code start here  --}}
    <link href="{{asset('frontend')}}/vendor/select2-plugin/select2.min.css" rel="stylesheet">
    {{--select2-plugin css code end here  --}}

<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{route('index')}}"><h2>E-commerce <em>P.O</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" >
              <li class="nav-item {{(request()->routeIs('index')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('index')}}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item {{(request()->routeIs('our_products')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('our_products')}}">Our Products</a>
              </li>
              <li class="nav-item {{(request()->routeIs('about')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('about')}}">About Us</a>
              </li>
              <li class="nav-item {{(request()->routeIs('contact')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
              </li>
            @guest
                <a href="{{route('customer.login')}}" style="color: #f77575; font-size: 17px; font-weight: bold; margin: 10px 0 0 80px;">
                Login</a>
            @else
                @if (auth()->user()->role == 'Customer')
                    <a href="{{route('customer.dashboard')}}" style="color: #f77575; font-size: 17px; font-weight: bold; margin: 10px 0 0 80px;">
                        Customer Dashboard</a>
                @else
                    <a href="{{route('home')}}" style="color: #f77575; font-size: 17px; font-weight: bold; margin: 10px 0 0 80px;">
                        Admin Dashboard</a>
                @endif
            @endguest

                <a href="{{route('cart.page')}}" style="color: #bbd7c9; font-size: 17px; font-weight: bold; margin: 10px 0 0 26px;">
                    <i class="fa fa-cart-plus fa-2x pb-3" aria-hidden="true"></i>
                    (<span id="header_cart_num">{{App\Models\Cart::where('user_id',auth()->id())->count()}}</span>)
                </a>

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content start here -->
    @yield('content')
    <!-- Page Content end here -->


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; {{date('Y')}} {{env('APP_NAME')}}.

            - Development by:Ahosan Habib</p>

            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('frontend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    {{--product_detail js code start here  --}}
    <script src="{{asset('frontend')}}/vendor/product-details/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend')}}/vendor/product-details/js/jquery-1.11.1.min.js"></script>
    {{--product_detail js code end here  --}}

    {{--sweetalert js code start here  --}}
    <script src="{{asset('frontend')}}/vendor/sweetalert/sweetalert2@11.js"></script>
    {{--sweetalert js code end here  --}}

    {{--select2-plugin js code start here  --}}
    <script src="{{asset('frontend')}}/vendor/select2-plugin/select2.min.js"></script>
    {{--select2-plugin js code end here  --}}



    <!-- Additional Scripts -->
    <script src="{{asset('frontend')}}/js/custom.js"></script>
    <script src="{{asset('frontend')}}/js/owl.js"></script>
    <script src="{{asset('frontend')}}/js/slick.js"></script>
    <script src="{{asset('frontend')}}/js/isotope.js"></script>
    <script src="{{asset('frontend')}}/js/accordions.js"></script>



    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/62e1456e37898912e95fedf1/1g8vvef2k';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    {{-- script code start here --}}
    @yield('frontend_js_script_code')
    {{-- script code end here --}}

  </body>
</html>

