<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl-theme-default-min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css') }}">
        
        <title>Avijan</title>
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>
    <body>

        <!--Preloader starts-->
        <div class="loader js-preloader">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!--Preloader ends-->

        <!-- Theme Switcher Start -->
        <div class="switch-theme-mode">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div>
        <!-- Theme Switcher End -->

        <!-- Page Wrapper End -->
        <div class="page-wrapper">

            <!-- Header Section Start -->
            <header class="header-wrap">
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="header-top-left">
                                    <ul class="contact-info list-style">
                                        <li>
                                            <i class="flaticon-phone-call"></i>
                                            <a href="tel:666999888">+666-999-888</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-email-2"></i>
                                            <a href="">info@avijan.org</a>
                                        </li>
                                        <li>
                                            <i class="flaticon-pin"></i>
                                            <p>2767 Sunrise Street, NY 1002, USA</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="header-top-right">
                                    <ul class="social-profile list-style style1">
                                        <li>
                                            <a href="https://facebook.com/" target="_blank">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                           <a href="https://twitter.com/" target="_blank">
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                           <a href="https://linkedin.com/" target="_blank">
                                                <i class="ri-linkedin-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://pinterest.com/">
                                                <i class="ri-pinterest-line"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container align-items-center">
                        <nav class="navbar navbar-expand-md navbar-light">
                           <a class="navbar-brand" href="index.html">
                                <img class="logo-light" src="assets/img/logo.png" alt="logo">
                                {{-- <img class="logo-dark" src="assets/img/logo-white.png" alt="logo"> --}}
                            </a>
                            <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                                <div class="menu-close d-lg-none">
                                    <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                                </div>
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" class="nav-link">
                                            Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">
                                            About Us
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">
                                            Events
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">
                                            Articles
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">
                                            Policy
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html" class="nav-link">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        
                        <div class="mobile-bar-wrap">
                            <div class="mobile-menu d-lg-none">
                                <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>    
            <!-- Header Section End -->

            @yield('content')

            <!-- Footer Section Start -->
            <footer class="footer-wrap">
                <div class="footer-top">
                    <img src="assets/img/footer-shape-2.png" alt="Image" class="footer-shape-one moveHorizontal">
                    <img src="assets/img/sun-2.png" alt="Image" class="footer-shape-two rotate">
                    <img src="assets/img/bird.html" alt="Image" class="footer-shape-three flyLeft">
                    <div class="container">
                        <div class="row pt-100 pb-75">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 pe-xl-5">
                                <div class="footer-widget">
                                    <a href="index.html" class="footer-logo">
                                        <img src="assets/img/logo-white.png" alt="Image">
                                    </a>
                                    <p class="comp-desc">
                                        Lorem ipsum dolor sit amet consc tetur adicing elit. Dolor emque dicta molest enim beatae ame consequ atur tempo pretium auctor nam.
                                    </p>
                                    <div class="newsletter-form">
                                        <input type="email" placeholder="Email Address">
                                        <button type="button">Subscribe Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ps-xl-5 ps-lg-4 ps-md-5">
                                <div class="footer-widget">
                                    <h3 class="footer-widget-title">Explore</h3>
                                    <ul class="footer-menu list-style">
                                        <li>
                                            <a href="event-details.html">
                                            Fundraise For Health
                                            </a>
                                        </li>
                                        <li>
                                            <a href="event-details.html">
                                            Shelter For Refuge
                                            </a>
                                        </li>
                                        <li>
                                            <a href="event-details.html">
                                                Adopt Orphan Child
                                            </a>
                                        </li>
                                        <li>
                                            <a href="event-details.html">
                                                Education For Poor
                                            </a>
                                        </li>
                                        <li>
                                            <a href="event-details.html">
                                               Clean Water Project
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 ">
                                <div class="footer-widget">
                                    <h3 class="footer-widget-title">Other Pages</h3>
                                    <ul class="footer-menu list-style">
                                        <li>
                                            <a href="about.html">
                                            About us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="team.html">
                                               Our Team
                                            </a>
                                        </li>
                                        <li>
                                            <a href="event.html">
                                            Recent Events
                                            </a>
                                        </li>
                                        <li>
                                            <a href="donation.html">
                                            Make Donation
                                            </a>
                                        </li>
                                        <li>
                                            <a href="contact.html">
                                               Get In Touch
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ps-md-5">
                                <div class="footer-widget">
                                    <h3 class="footer-widget-title">Official Info</h3>
                                    <ul class="contact-info list-style">
                                        <li>
                                            <i class="flaticon-pin"></i>
                                            <h6>Location</h6>
                                            <p>2767 Sunrise Street, NY 1002, USA</p>
                                        </li>
                                        <li>
                                            <i class="flaticon-mail"></i>
                                            <h6>Email</h6>
                                            <a href="https://templates.hibotheme.com/cdn-cgi/l/email-protection#2048454c4c4f60434c494d0e434f4d"><span class="__cf_email__" data-cfemail="4a222f2626250a2926232764292527">[email&#160;protected]</span></a>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone-call"></i>
                                            <h6>Phone</h6>
                                            <a href="tel:13454567877">+1-3454-5678-77</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-6 col-sm-7">
                                <p class="copyright-text"><i class="ri-copyright-line"></i> Clim is proudly owned by <a href="https://hibotheme.com/">HiboTheme</a></p>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-5">
                                <ul class="social-profile style1 list-style">
                                    <li>
                                        <a href="https://facebook.com/">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://instagram.com/">
                                            <i class="ri-instagram-line"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Section End -->
        
        </div>
        <!-- Page Wrapper End -->
        
        <!-- Back-to-top button Start -->
        <a href="javascript:void(0)" class="back-to-top bounce">
            <i class="ri-arrow-up-s-line"></i>
        </a>
        <!-- Back-to-top button End -->

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/aos.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl-thumb.min.js') }}"></script>
        <script src="{{ asset('assets/js/odometer.js') }}"></script>
        <script src="{{ asset('assets/js/circle-progressbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets/js/tweenmax.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>


</html>