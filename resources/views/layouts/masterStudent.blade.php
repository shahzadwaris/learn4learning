<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
    @yield('css')
    @stack('css')
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
                            @if(!Auth::check())


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
                                    <li><a href="{{ route('login') }}"
                                            class="{{Request::routeIs('login') ? 'active' : ''}}"
                                            style="background: none !important;color:black;">SIGN IN</a></li>
                                    <li><a href="{{ route('register') }}"
                                            class="{{Request::routeIs('register') ? 'active' : ''}}">SIGN UP</a></li>
                                </ul>
                            </div>
                            @endif
                            @if(Auth::check())
                            <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="    margin-top:px;
">

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" style="color: black" class="nav-link dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            @lang('home.Language') <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('/locale/en') }}"><img
                                                    src="{{asset('asset/images/flag/us.png')}}" width="30px"
                                                    height="20x"> English</a>
                                            <a class="dropdown-item" href="{{ url('/locale/fr') }}"><img
                                                    src="{{asset('asset/images/flag/fr.png')}}" width="30px"
                                                    height="20x"> French</a>
                                        </div>
                                    </li>
                                </ul>

                            </nav>

                            <div class="login-register" style="margin-top: 10px">
                                <ul>
                                    <li><a style="background: none !important;color:black;">{{Auth::user()->fname}}</a>
                                    </li>
                                    <li>
                                        {{-- <form method="post" action="{{route('logout')}}">
                                        @csrf
                                        <button class="btn-sm btn-outline-primary">logout</button>
                                        </form> --}}
                                        <a class="btn btn-primary" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
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
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            {{----}}
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="{{Request::routeIs('studentHome') ? 'active' : ''}}"
                                            href="{{route('studentHome')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{Request::routeIs('student_schedule') ? 'active' : ''}}"
                                            href="{{route('student_schedule')}}">MY SCHEDULE</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{Request::routeIs('My_subjects') ? 'active' : ''}}"
                                            href="{{route('My_subjects')}}">MY SUBJECTS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{Request::routeIs('studetnsHomeWork') ? 'active' : ''}}"
                                            href="{{route('studetnsHomeWork')}}">MY HOMEWORK</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="" href="# ">MY ACHIEVEMENT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="" href="{{route('viewOurMessages')}}">MY MESSAGES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{Request::routeIs('tudent.account') ? 'active' : ''}}"
                                            href="{{route('student.account')}}">MY ACCOUNT</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="{{Request::routeIs('donate') ? 'active' : ''}}"
                                            href="{{route('donate')}}"
                                            style="background-color: #ffc10e;padding: 12px 40px 12px 40px;margin: 19px 2px 2px 2px;color: white;border-radius: 6px;">DONATE</a>
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
    <div class="row p-0 m-0">
        <div class="col-2"></div>
        <div class="col-8">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <div class="flash-message mt-5" id='success-alert'>

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
            </div>
            @endif
            @endforeach
        </div>
        <div class="col-2"></div>
    </div>

    @yield('content')
    {{--content--}}

    <!--====== COURSE PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-section-wrap footer-link mt-40">
                            <div class="logo" style="float: left;">

                                <a href="{{route('homee')}}"><img src="{{asset('asset/images/footerlogo.png')}}"
                                        alt="Logo"></a>
                            </div>

                            <div class="right-inner-div ml-3">

                                <ul style="margin-left: 23px" class="text-center">
                                    <li><a href="#">Powered by Hot Dog Solutions</a></li>
                                    <li><a href="#">Contact US</a></li>
                                    <li><a href="#">Visit our Website</a></li>

                                </ul>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-link mt-40">

                            <ul class="text-center">
                                <li><a href="{{route('page.show', 'terms-and-conditions')}}">Terms and Conditions </a>
                                </li>
                                <li><a href="{{route('page.show','privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="#">Cookies Policy</a></li>

                            </ul>

                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-link support mt-40">

                            <ul class="text-center">
                                <li><a href="{{route('howitworks')}}">How it Works</a></li>
                                <li><a href="{{route('teachers')}}">For Teachers</a></li>
                                <li><a href="{{route('students')}}">For Students</a></li>

                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="footer-link support mt-40">

                            <ul class="text-center">
                                <li><a href="{{route('parents')}}">For Parents </a></li>
                                <li><a href="{{route('donate')}}">Donate</a></li>
                                <li><a href="#">Contact Us</a></li>

                            </ul>
                        </div> <!-- support -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        {{----}}
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright  text-center pt-15">
                            <p>&copy;@lang('footer.footer_info')
                                &nbsp; - &nbsp; @lang('footer.Designed_by') <span>Rkixtech</span>
                            </p>
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
    {{-- <script src="{{asset('asset/js/vendor/jquery-1.12.4.min.js')}}"></script> --}}
    <script src="{{asset('asset/js/jquery.min.js')}}"></script>

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
    @yield('js')
    <script>
        // Material Select Initialization
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
            $("#success-alert").slideUp(500);
            $('.mdb-select').materialSelect();
        });
    });
    </script>
</body>



</html>