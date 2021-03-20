<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>

    <link href="{{asset('front_asset/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('front_asset/css/jquery.simpleLens.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_asset/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_asset/css/nouislider.css')}}">
    <link id="switcher" href="{{asset('front_asset/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front_asset/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('front_asset/css/style.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <script>
        var PRODUCT_IMAGE = "{{asset('storage/media/')}}";
    </script>
  </head>
  <body class="productPage">
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>
    <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="{{asset('front_asset/img/flag/english.jpg')}}" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="{{asset('front_asset/img/flag/french.jpg')}}" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="{{asset('front_asset/img/flag/english.jpg')}}" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="javascript:void(0)">My Account</a></li>
                  <li class="hidden-xs"><a href="{{url('/cart')}}">My Cart</a></li>
                  <li class="hidden-xs"><a href="javascript:void(0)">Checkout</a></li>
                  @if (session()->has('FRONT_USER_LOGIN') != null)
                    <li><a href="{{url('/logout')}}">Logout</a></li>
                  @else
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{url('/')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>daily<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
               @php
                   $getAddToCartTotalItem = getAddToCartTotalItem();
                   $totalCartItem = count($getAddToCartTotalItem);
                   $totalPrice = 0;
               @endphp
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="javascript:void(0)" id="cartBox">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify">{{$totalCartItem}}</span>
                </a>
                <div class="aa-cartbox-summary">
                  @if ($totalCartItem > 0)
                  <ul>
                    @foreach ($getAddToCartTotalItem as $cartItem)
                    @php
                        $totalPrice = $totalPrice + ($cartItem ->qty * $cartItem ->price);
                    @endphp
                        <li>
                            <a class="aa-cartbox-img" href="#"><img src="{{asset('storage/media/'.$cartItem ->image)}}" alt="img"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">{{$cartItem ->name}}</a></h4>
                                <p>{{$cartItem ->qty}} x Rs {{$cartItem ->price}}</p>
                            </div>
                            <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                        </li>
                    @endforeach
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        Rs {{$totalPrice}}
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{url('/checkout')}}">Checkout</a>
                 @endif
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="search_str" placeholder="Search here ex. 'man' ">
                  <button type="button" onclick="funSearch()"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
           {!! getTopNavCat() !!}
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->
  @section('container')
  @show
  <!-- Client Brand -->
  {{-- <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li>
                  <a href="#">
                      <img src="{{asset('front_asset/img/client-brand-java.png')}}" alt="java img">
                  </a>
            </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <!-- / Client Brand -->


  <!-- footer -->
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login</h4>
          <form class="aa-login-form" id="frmLogin">
              @csrf
            <label for="">Email address<span>*</span></label>
            <input type="email" placeholder="Email" name="str_login_email" required>
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password" name="str_login_password" required>
            <button class="aa-browse-btn" type="submit" id="btnLogin">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <div id="login_msg"></div>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="{{url('registration')}}">Register now!</a>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="{{asset('front_asset/js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_asset/js/jquery.smartmenus.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_asset/js/jquery.smartmenus.bootstrap.js')}}"></script>
  <script src="{{asset('front_asset/js/sequence.js')}}"></script>
  <script src="{{asset('front_asset/js/sequence-theme.modern-slide-in.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_asset/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_asset/js/jquery.simpleLens.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_asset/js/slick.js')}}"></script>
  <script type="text/javascript" src="{{asset('front_asset/js/nouislider.js')}}"></script>
  <script src="{{asset('front_asset/js/custom.js')}}"></script>
  </body>
</html>
