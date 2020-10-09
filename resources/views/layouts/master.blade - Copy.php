<!doctype html>
<html lang="en">
<!-- Mirrored from thepixelcurve.com/html/edubin/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jun 2020 12:44:03 GMT -->
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>@yield('title')</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('asset/images/logo1.png')}}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/animate.css')}}">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/nice-select.css')}}">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/magnific-popup.css')}}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/font-awesome.min.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/work.css')}}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}">


</head>
<body>
<!--====== PRELOADER PART START ======-->
<!--====== PRELOADER PART START ======-->
<!--====== HEADER PART START ======-->

    <header id="header-part" class="header-two">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header-contact">
{{----}}
                        </div> <!-- header contact -->
                    </div>
                    <div class="col-md-6">
                        <div class="header-right d-flex justify-content-end">
                            <div class="social d-flex">
                                <ul>
                                    <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                                </ul>
                                <span class="follow-us">Contact Us</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div> <!-- social -->
                            <div class="login-register">
                                <ul>
                                    <li><a href="{{ route('login') }}" style="background: none !important;color:black;">SIGN IN</a></li>
                                    <li><a href="{{ route('register') }}">SIGN UP</a></li>
                                </ul>
                            </div>
                        </div> <!-- header right -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
{{----}}
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{route('homee')}}">
                                <img src="{{asset('asset/images/logo1.png')}}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
{{----}}
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="active" href="{{route('homee')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('howitworks')}}">HOW IT WORKS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('students')}}">FOR STUDENTS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('teachers')}}">FOR TEACHERS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">FOR PARENTS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('mockupschedule')}}">SCHEDULE</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html" style="background-color: #ffc10e;padding: 12px 40px 12px 40px;margin: 19px 2px 2px 2px;color: white;border-radius: 6px;">DONATE</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
{{--content--}}

@yield('content')
{{--content--}}

<!--====== COURSE PART ENDS ======-->

<!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="{{route('home')}}"><img src="{{asset('asset/images/logo1.png')}}" alt="Logo"></a>
                            </div>
                            <p>Gravida nibh vel velit auctor aliquetn quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate.</p>
                            <ul class="mt-20">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="index.html"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="about.html"><i class="fa fa-angle-right"></i>About us</a></li>
                                <li><a href="courses.html"><i class="fa fa-angle-right"></i>Courses</a></li>
                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>News</a></li>
                                <li><a href="events.html"><i class="fa fa-angle-right"></i>Event</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Gallery</a></li>
                                <li><a href="shop.html"><i class="fa fa-angle-right"></i>Shop</a></li>
                                <li><a href="teachers.html"><i class="fa fa-angle-right"></i>Teachers</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Support</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>143 castle road 517 district, kiyev port south Canada</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+3 123 456 789</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@yourmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
{{----}}
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p>&copy;2020 Copyrights Learn4Learning All rights reserved. </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                            <p>Designed by <span>Pixelcurve</span> </p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TP PART START ======-->

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<!--====== jquery js ======-->
<script src="{{asset('asset/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('asset/js/vendor/jquery-1.12.4.min.js')}}"></script>

<!--====== Bootstrap js ======-->
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>

<!--====== Slick js ======-->
<script src="{{asset('asset/js/slick.min.js')}}"></script>

<!--====== Magnific Popup js ======-->
<script src="{{asset('asset/js/jquery.magnific-popup.min.js')}}"></script>

<!--====== Counter Up js ======-->
<script src="{{asset('asset/js/waypoints.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.counterup.min.js')}}"></script>

<!--====== Nice Select js ======-->
<script src="{{asset('asset/js/jquery.nice-select.min.js')}}"></script>

<!--====== Nice Number js ======-->
<script src="{{asset('asset/js/jquery.nice-number.min.js')}}"></script>

<!--====== Count Down js ======-->
<script src="{{asset('asset/js/jquery.countdown.min.js')}}"></script>

<!--====== Validator js ======-->
<script src="{{asset('asset/js/validator.min.js')}}"></script>

<!--====== Ajax Contact js ======-->
<script src="{{asset('asset/js/ajax-contact.js')}}"></script>

<!--====== Main js ======-->
<script src="{{asset('asset/js/main.js')}}"></script>

<!--====== Map js ======-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
<script src="{{asset('asset/js/map-script.js')}}"></script>

<script src="https://kit.fontawesome.com/0141eabd3d.js" crossorigin="anonymous"></script>

</body>


<!-- Mirrored from thepixelcurve.com/html/edubin/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jun 2020 12:44:37 GMT -->
</html>
