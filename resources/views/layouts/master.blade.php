<!DOCTYPE html>
  
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HMS</title>   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
           
    <!--================= Page Title ======================-->
    <title>Hotel Management System</title>
    <!--================= Favicons ========================-->
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/logo.jpg') }}">
    <!--================= Custom Font =====================-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7cPlayfair+Display:400,700,900" rel="stylesheet">
    <!--====== Custom CSS for themes and color schemer =======-->
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color-schemer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <!--================= Modernize =======================-->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
  </head>
  <body>
        <div id="app"> 
    <!--================= Header ==========================-->
    <header id="masthead" class="site-header">
            <div class="header-top">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 hidden-xs">
                    <div class="addresses">
                      <div class="block-time"><i class="fa fa-clock-o"></i>
                        <p>Customer care - <span>10am to 8pm</span></p>
                      </div>
                      <div class="phone"><i class="fa fa-phone"></i>
                        <p>Call Us - <span>08056774653</span></p>
                      </div>
                      <div class="email"><i class="fa fa-envelope"></i>
                        <p>computerscience@hms.com</p>
                      </div>
                    </div><!--/.addresses-->
                  </div><!--/.col-md-8-->
                  <div class="col-md-4">             
                  </div><!--/.col-md-4-->
                </div><!--/.row-->
              </div><!--/.container-->
            </div><!--/.header-top-->
            <!--Header Bottom-->
            <div class="header-bottom">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="menu-wrapper clearfix">
                      <div class="navbar-header pull-left">
                        <div class="logo-block"><a href="index.html" class="site-logo"><img style="width: 40px;" src="{{ asset('images/logo.jpg') }}" alt="sitelogo" class="logo"></a><!--/.site-logo--></div>
                      </div><!--/.navbar-header-->
                      <div class="collapse navbar-collapse pull-right">
                        <div class="navigation hidden-sm hidden-xs">
                          <ul class="nav mainmenu" style="float:left;">
                            <li><router-link to="/">Home</router-link>                      
                            </li>
                            <li><router-link to="/rooms">Browse Rooms</router-link>                      
                            </li>
                            @guest
                            <li><a href="/login" class="single-facility">Login</a>
                            </li>
                            <li><a href="/register" class="single-facility">Register</a>
                            </li> 
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle single-facility" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item single-facility" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest                   
                          </ul><!--/.mainmenu-->
                        </div><!--/.navigation-->
                        <!--Mobile Main Menu-->
                        <div class="mobile-menu-main hidden-md hidden-lg">
                          <div class="menucontent overlaybg"> </div>
                          <div class="menuexpandermain slideRight"><a id="navtoggole-main" class="animated-arrow slideLeft menuclose"><span></span></a><span id="menu-marker"></span></div><!--/.menuexpandermain-->
                          <div id="mobile-main-nav" class="main-navigation slideLeft">
                            <div class="menu-wrapper">
                              <div id="main-mobile-container" class="menu-content clearfix"></div>
                            </div>
                          </div><!--/#mobile-main-nav-->
                        </div><!--/.mobile-menu-main-->
                      </div><!--/.navbar-collapse-->
                    </div><!--/.menu-wrapper-->
                  </div><!--/.col-md-12-->
                </div><!--/.row-->
              </div><!--/.container-->
            </div><!--/.header-bottom-->
          </header><!--/.site-header-->
               
    <router-view></router-view>
   



<!--================= Site Footer ===================-->
<div id="footer-top-section" style="background-image:url('images/footer-top-bg.jpg')" class="bg-image">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title-area text-center">
            <h2 class="section-title">We Are Available<br>For You 24/7</h2>
            <p class="section-title-dec">Our online support service is always 24 Hours</p>
          </div><!--/.section-title-area-->
        </div><!--/.col-md-12-->
      </div><!--/.row-->
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget-area footer-sidebar-top-1">
            <aside class="widget clearfix widget_address">
              <div class="widget-title-area">
                <h4 class="widget-title">address</h4>
              </div><!--/.widget-title-area-->
              <div class="widget-content">
                <p>Computer Science, TASUED, Ijebu-Ode, Nigeria</p>
              </div>
            </aside><!--/.widget_address-->
          </div><!--/.footer-sidebar-top-1-->
        </div><!--/.col-md-3-->
        <div class="col-sm-6 col-md-3">
          <div class="widget-area footer-sidebar-top-2">
            <aside class="widget clearfix widget_call_us">
              <div class="widget-title-area">
                <h4 class="widget-title">call</h4>
              </div><!--/.widget-title-area-->
              <div class="widget-content">
                <p>09067974323</p>
                <p>08056774653</p>
              </div>
            </aside><!--/.widget_call_us-->
          </div><!--/.footer-sidebar-top-2-->
        </div><!--/.col-md-3-->
        <div class="col-sm-6 col-md-3">
          <div class="widget-area footer-sidebar-top-3">
            <aside class="widget clearfix widget_mail_us">
              <div class="widget-title-area">
                <h4 class="widget-title">mail</h4>
              </div><!--/.widget-title-area-->
              <div class="widget-content">
                <p>computerscience@hms.com</p>
              </div>
            </aside><!--/.widget_mail_us-->
          </div><!--/.footer-sidebar-top-3-->
        </div><!--/.col-md-3-->
        <div class="col-sm-6 col-md-3">
          <div class="widget-area footer-sidebar-top-4">
            <aside class="widget clearfix widget_social_media">
              <div class="widget-title-area">
                <h4 class="widget-title">social Account</h4>
              </div><!--/.widget-title-area-->
              <div class="widget-social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-google-plus"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div><!--/.widget-social-->
            </aside><!--/.widget_social_media-->
          </div><!--/.footer-sidebar-top-4-->
        </div><!--/.col-md-3-->
      </div><!--/.row-->
    </div><!--/.container-fluid-->
  </div><!--/#footer-top-section-->
  <footer id="colophon" class="site-footer">
    <!-- Footer Bottom Section-->
    <div id="footer-bottom-section">
      <div class="container">          
        <div class="row">            
          <div class="col-md-12">
            <div class="copyright text-center">                           
              <p>Copyright  2019 HMS  -  All Right Reserved</p>
            </div><!--/.copyright-->
          </div><!--/.copyright-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/#footer-bottom-section-->
  </footer><!--/.site-footer-->
</div>
  <!--********************* JS FILE DECLARATION *****************************  -->
  <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script><!--Jquery-->
  <script src="{{ asset('js/vendor/jQuery-Migrate.min.js') }}"></script><!--jQuery-Migrate-->
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"> </script> 
  <script src="{{ asset('js/plugins.js') }}"></script><!--plugins js-->
  <script src="{{ asset('js/aravira.js') }}"></script><!--aravira-app-->
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   

</body>

</html>