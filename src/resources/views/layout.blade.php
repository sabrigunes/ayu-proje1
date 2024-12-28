<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <!-- Stylesheets -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/slick.css">
    <link href="/css/mmenu.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    @yield('css')


    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="boxcar-wrapper">

    <!-- Main Header-->
    <header class="boxcar-header header-style-v1 style-two inner-header  @if(Route::is('index')) bb-0 @else cus-style-1 @endif">
        <div class="header-inner">
            <div class="inner-container">
                <!-- Main box -->
                <div class="c-box">
                    <div class="logo-inner">
                        <div style="max-width:180px;"><a href="{{ route('index') }}"><img src="/images/logo_new.png" alt="" title="Boxcar"></a></div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-out-bar">
                        <nav class="nav main-menu">
                            <ul class="navigation" id="navbar">
                                <li><a href="{{ route('about_us') }}">Hakkımızda</a>
                                </li>
                                <li><a href="{{ route('contact') }}">Bize Ulaşın</a>
                                </li>
                                <li><a href="{{ route('terms') }}">Kullanım Şartları</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Main Menu End-->
                    </div>

                    <div class="right-box">
                        <a href="@if(isset(\Illuminate\Support\Facades\Auth::user()->id)) {{ route('admin_get_car_list') }} @else {{ route('login') }} @endif" title="" class="box-account">
                            <div class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_147_6490)">
                                        <path d="M7.99998 9.01221C3.19258 9.01221 0.544983 11.2865 0.544983 15.4161C0.544983 15.7386 0.806389 16.0001 1.12892 16.0001H14.871C15.1935 16.0001 15.455 15.7386 15.455 15.4161C15.455 11.2867 12.8074 9.01221 7.99998 9.01221ZM1.73411 14.8322C1.9638 11.7445 4.06889 10.1801 7.99998 10.1801C11.9311 10.1801 14.0362 11.7445 14.2661 14.8322H1.73411Z" fill="white"/>
                                        <path d="M7.99999 0C5.79171 0 4.12653 1.69869 4.12653 3.95116C4.12653 6.26959 5.86415 8.15553 7.99999 8.15553C10.1358 8.15553 11.8735 6.26959 11.8735 3.95134C11.8735 1.69869 10.2083 0 7.99999 0ZM7.99999 6.98784C6.50803 6.98784 5.2944 5.62569 5.2944 3.95134C5.2944 2.3385 6.43231 1.16788 7.99999 1.16788C9.54259 1.16788 10.7056 2.36438 10.7056 3.95134C10.7056 5.62569 9.49196 6.98784 7.99999 6.98784Z" fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_147_6490">
                                            <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            @if(isset(\Illuminate\Support\Facades\Auth::user()->id))
                            {{\Illuminate\Support\Facades\Auth::user()->name.'
                            '.strtoupper(\Illuminate\Support\Facades\Auth::user()->surname)}}
                            @else
                                Giriş Yap
                            @endif


                        </a>
                    </div>
                </div>
                <!-- Mobile Menu  -->
            </div>
        </div>

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            <button class="close-search"><span class="fa fa-times"></span></button>

            <div class="search-inner">
                <form method="post" action="index.html">
                    <div class="form-group">
                        <input type="search" name="search-field" value="" placeholder="Search..." required="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->

        <div id="nav-mobile"></div>
    </header>
    <!-- End header-section -->

@yield('content')


    <!-- main footer -->
    <footer class="boxcar-footer footer-style-one v1 cus-st-1 mt-5">
        <div class="widgets-section mt-5">
            <div class="boxcar-container">
                <div class="row">
                    <!-- Footer COlumn -->
                    <div class="footer-column-two col-lg-9 col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget wow fadeInUp">
                                    <h4 class="widget-title">Useful Links</h4>
                                    <div class="widget-content">
                                        <ul class="user-links style-two">
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Careers</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">FAQs</a></li>
                                            <li><a href="#">Finance</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget wow fadeInUp" data-wow-delay="100ms">
                                    <h4 class="widget-title">Quick Links</h4>
                                    <div class="widget-content">
                                        <ul class="user-links style-two">
                                            <li><a href="#">Get in Touch</a></li>
                                            <li><a href="#">Help center</a></li>
                                            <li><a href="#">Live chat</a></li>
                                            <li><a href="#">How it works</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget wow fadeInUp" data-wow-delay="200ms">
                                    <h4 class="widget-title">Our Brands</h4>
                                    <div class="widget-content">
                                        <ul class="user-links style-two">
                                            <li><a href="#">Aston Martin</a></li>
                                            <li><a href="#">Audi</a></li>
                                            <li><a href="#">Bentley</a></li>
                                            <li><a href="#">BMW</a></li>
                                            <li><a href="#">Bugatti</a></li>
                                            <li><a href="#">Ferrari</a></li>
                                            <li><a href="#">Jaguar</a></li>
                                            <li><a href="#">Lamborghini</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget wow fadeInUp" data-wow-delay="300ms">
                                    <h4 class="widget-title">Vehicles Type</h4>
                                    <div class="widget-content">
                                        <ul class="user-links style-two">
                                            <li><a href="#">Pickup</a></li>
                                            <li><a href="#">Coup</a></li>
                                            <li><a href="#">Family MPV</a></li>
                                            <li><a href="#">Sedan</a></li>
                                            <li><a href="#">SUVs</a></li>
                                            <li><a href="#">Sport Coupe</a></li>
                                            <li><a href="#">Convertible</a></li>
                                            <li><a href="#">Wagon</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer column -->
                    <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-widget social-widget wow fadeInUp" data-wow-delay="400ms">
                            <h4 class="widget-title">Vehicles Type</h4>
                            <div class="widget-content">
                                <a href="#" class="store">
                                    <img src="/images/resource/apple.png">
                                    <span>Download on the</span>
                                    <h6 class="title">Apple Store</h6>
                                </a>
                                <a href="#" class="store two">
                                    <img src="/images/resource/play.png">
                                    <span>Get in on</span>
                                    <h6 class="title">Google Play</h6>
                                </a>
                                <div class="social-icons">
                                    <h6 class="title">Connect With Us</h6>
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Footer Bottom -->
        <div class="footer-bottom">
            <div class="boxcar-container">
                <div class="inner-container">
                    <div class="copyright-text wow fadeInUp">© <a href="#">2024 Boxcars.com. All rights reserved.</div>

                    <ul class="footer-nav wow fadeInUp" data-wow-delay="100ms">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Notice</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End boxcar-footer -->



</div><!-- End Page Wrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<script src="/js/jquery.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/slick-animation.min.js"></script>
<script src="/js/jquery.fancybox.js"></script>
<script src="/js/wow.js"></script>
<script src="/js/appear.js"></script>
<script src="/js/mixitup.js"></script>
<script src="/js/knob.js"></script>
<script src="/js/mmenu.js"></script>
<script src="/js/rangle-slider.js"></script>
<script src="/js/main.js"></script>
@yield('js')
</body>
</html>
