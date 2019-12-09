<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Ashley Beauty Lounge</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
    {{-- <link rel="icon" href="{{asset('akame/img/core-img/favicon.ico')}}"> --}}
    <link rel="icon" href="{{asset('image/ashleyfav.png')}}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    {{-- <link href="css/modal.css" rel="stylesheet"> --}}
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('akame/style.css')}}">
@yield('head')
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-5">
                        <div class="top-header-content">
                            <p>Welcome to Ashley Beauty Lounge!</p>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="top-header-content text-right">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Mon-Sat: 8.00 to 17.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call 0816-1922-942</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.html"><img style="width: 90px" src="{{asset('image/ashley.png')}}" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{route('awal')}}">Home</a></li>
                                    {{-- <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./index.html">- Home</a></li>
                                            <li><a href="./about.html">- About Us</a></li>
                                            <li><a href="./service.html">- Services</a></li>
                                            <li><a href="./portfolio.html">- Portfolio</a></li>
                                            <li><a href="./blog.html">- Blog</a></li>
                                            <li><a href="./single-blog.html">- Blog Details</a></li>
                                            <li><a href="./contact.html">- Contact</a></li>
                                            <li><a href="#">- Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li><a href="./portfolio.html">Portfolio</a></li> --}}
                                    <li class="{{ Request::is('services') ? 'active' : '' }}"><a href="{{route('services')}}">Services</a></li>
                                    <li class="{{ Request::is('aboutus') ? 'active' : '' }}"><a href="{{route('aboutus')}}">About Us</a></li>
                                    <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="{{route('blog')}}">Blog</a></li>
                                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                                    @if (Auth::check())
                                    <li><a href="#">{{Auth::User()->name}}</a>
                                        <ul class="dropdown">
                                            <li>
                                                {{-- <a href="./index.html"><i class="fa fa-sign-out"></i> Logout</a> --}}
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out"></i> Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif

                                </ul>
                                @if (Auth::check())
                                <!-- Cart Icon -->
                                <div class="cart-icon ml-5 mt-4 mt-lg-0">
                                    <a href="#"><i class="icon_cart"></i> <span class="badge">0</span></a>
                                </div>
                                @endif
                                <!-- Book Icon -->
                                <div class="book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                <a class="btn akame-btn" href="{{route('ashley.login')}}">Book Now</a>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
@yield('konten')
    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="foot col-12 col-sm-6 col-md-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img style="width: 200px;" src="{{asset('image/ashley1.jpg')}}" alt=""></a>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="foot col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Opening times</h4>

                        <!-- Open Times -->
                        <div class="open-time">
                            <p>Everyday: 08.00 - 20.00</p>
                        </div>

                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="https://web.facebook.com/ashleybeautylounge/" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/ashleybeautylounge/" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="foot col-12 col-md-4 col-xl-3">
                    <div class="single-footer-widget mb-80">

                        <!-- Widget Title -->
                        <h4 class="widget-title">Contact Us</h4>

                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p>Tel: 0816-1922-942</p>
                            <p>E-mail: ashleyindo@gmail.com</p>
                            <p>Address: Ruko Azores Blok 7C/12, Banjar Wijaya, Jl. Wijaya Kusuma, RT.001/RW.003, Poris Plawad Indah, Cipondoh, Tangerang City, Banten 15142</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    <!-- All JS Files -->
    <!-- jQuery -->
    <script src="{{asset('akame/js/jquery.min.js')}}"></script>
    <!-- Popper -->
    <script src="{{asset('akame/js/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('akame/js/bootstrap.min.js')}}"></script>
    <!-- All Plugins -->
    <script src="{{asset('akame/js/akame.bundle.js')}}"></script>
    <!-- Active -->
    <script src="{{asset('akame/js/default-assets/active.js')}}"></script>

    {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}

</body>

</html>
