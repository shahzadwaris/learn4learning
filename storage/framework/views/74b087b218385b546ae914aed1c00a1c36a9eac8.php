<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo e(asset('asset/images/logo1.png')); ?>" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/slick.css')); ?>">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/animate.css')); ?>">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/nice-select.css')); ?>">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/jquery.nice-number.min.css')); ?>">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/magnific-popup.css')); ?>">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/bootstrap.min.css')); ?>">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/font-awesome.min.css')); ?>">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/default.css')); ?>">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/work.css')); ?>">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/responsive.css')); ?>">
    <style>
        a.no-styleing {
            background: none;
            border: none;
            background: white !important;
            color: black;
            color: black !important;
        }


        .dropdown {
            position: relative;
            display: inline-block;
            margin-right: 20px;
        }
        .dropdown-content > form {
            margin-bottom: 0px;
            margin-top: 15px;
            cursor: pointer;
        }
        .btn-outline-primary{
            color: #000;
            background-color: transparent;
            background-image: none;
            cursor: pointer;
            border-color: #ffc10e;
        }
        .btn-outline-primary:hover{
            cursor: pointer;
            color: #ffc10e;
            background-color: transparent;
            background-image: none;
            border-color: #ffc10e;
        }
        .dropdown-content {
            cursor: pointer;
            display: none;
            padding: 17px 6px;
            position: absolute;
            right: 0px;
            /*top: 20px;*/
            border: 1px solid #ffc10e;
            background-color: white;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .error {
            color: red;
        }
        @media (max-width: 500px) {
            .footer-link ul li {
                line-height: 35px;
                text-align: left;
            }
            .cuContainerM {
                padding: 0px;
            }
        }
        .customClass{
            margin: 2px 2px 2px 2px;
        }
        .navigation .navbar .navbar-nav li {
            position: relative;
            display: flex;
            align-items: center;
        }
        @media (max-width: 991px) {
            .navigation .navbar .navbar-nav li {
                position: relative;
                display: flex;
                align-items: center;
                width: 100%;
                justify-content: center;
            }
            .customClass{
                margin: 2px 2px 2px 2px;
                width: 100%;
            }
        }
         @media(max-width: 575px) {
        .logo {
            text-align: center;
            float: unset !important;
            margin-bottom: 8px; 
        }
        .footer-link ul {
            width: 100%;
            float: unset !important;
            overflow: hidden;
            margin-left: 0px !important;
            text-align: center !important;
        }
        .footer-link ul li {
            line-height: 35px;
            text-align: center;
        }
      }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <style>
        #toast-container > .toast-success {
            background-color:#ffc10e !important;
            color: #fff !important;
        }
        #course-part {
            padding-bottom: 0px !important;
        }
    </style>
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>

    <header id="header-part" class="header-two">
        
        <div class="header-top d-none d-lg-block" style="padding-bottom: 22px">
            <div class="container" style="margin-top: 14px">
                <div class="row">
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6">
                        <div class="header-right d-flex justify-content-end">

                            <?php if(!Auth::check()): ?>

                            <nav class="navbar navbar-expand-md navbar-light navbar-laravel "
                                style="    margin-top: -14px;">

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" style="color: black" class="nav-link dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            <?php echo app('translator')->get('home.Language'); ?> <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo e(url('/locale/en')); ?>"><img
                                                    src="<?php echo e(asset('asset/images/flag/us.png')); ?>" width="30px"
                                                    height="20x"> English</a>
                                            <a class="dropdown-item" href="<?php echo e(url('/locale/fr')); ?>"><img
                                                    src="<?php echo e(asset('asset/images/flag/fr.png')); ?>" width="30px"
                                                    height="20x"> French</a>
                                        </div>
                                    </li>
                                </ul>

                            </nav>
                            <div class="social d-flex">


                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>

                                </ul>
                            </div> <!-- social -->
                            <div class="login-register">
                                <ul>
                                    <li><a href="<?php echo e(route('login')); ?>"
                                            class="<?php echo e(Request::routeIs('login') ? 'active' : ''); ?>"
                                            style="background: none !important;color:black;"><?php echo app('translator')->get('home.SIGN_IN'); ?></a>
                                    </li>
                                    <li><a href="<?php echo e(route('register')); ?>"
                                            class="<?php echo e(Request::routeIs('register') ? 'active' : ''); ?>"><?php echo app('translator')->get('home.SIGN_UP'); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::check()): ?>
                            <nav class="navbar navbar-expand-md navbar-light navbar-laravel "
                                style="    margin-top: -14px;">

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" style="color: black" class="nav-link dropdown-toggle"
                                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            <?php echo app('translator')->get('home.Language'); ?> <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo e(url('/locale/en')); ?>"><img
                                                    src="<?php echo e(asset('asset/images/flag/us.png')); ?>" width="30px"
                                                    height="20x"> English</a>
                                            <a class="dropdown-item" href="<?php echo e(url('/locale/fr')); ?>"><img
                                                    src="<?php echo e(asset('asset/images/flag/fr.png')); ?>" width="30px"
                                                    height="20x"> French</a>
                                        </div>
                                    </li>
                                </ul>

                            </nav>
                            <div class="login-register" style="margin-right: 30px">

                                <?php $user= Auth::user();
                               switch ($user->type) {
                                   case 'teacher':?>
                                <ul>
                                    <li><a style="background: none !important;color:black;">
                                            <span><a class="no-styleing" href="<?php echo e(route('teacherHome')); ?>">
                                                    <?php echo e($user->fname); ?></span></a></li>
                                    <div class="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <div class="dropdown-content">
                                            <p><a style="color: black"
                                                    href="<?php echo e(route('teacher_edit_profile')); ?>"><?php echo app('translator')->get('home.Edit_Profile'); ?></a>
                                            </p>
                                            <form method="post" action="<?php echo e(route('logout')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn-sm btn-outline-primary">logout</button>
                                            </form>

                                        </div>
                                    </div>

                                </ul>
                                <?php   break;

                              case 'student':?>
                                <ul>
                                    <li>
                                        <a style="background: none !important;color:black;">
                                            <span><a class="no-styleing" href="<?php echo e(route('studentHome')); ?>">
                                                    <?php echo e($user->fname); ?></span></a></li>
                                    <div class="dropdown ml-auto">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <div class="dropdown-content">
                                            <a class="dropdown-item" style="color: black"
                                                href="<?php echo e(route('student_edit_profile')); ?>"><?php echo app('translator')->get('home.Edit_Profile'); ?></a>
                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();
                                                                                                            document.getElementById('logout-form').submit();">
                                                <?php echo e(__('Logout')); ?>

                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>

                                        </div>
                                    </div>

                                </ul>
                                <?php
                                       break;
                                       case 'admin':
                                   ?>
                                <ul>
                                    <li>
                                        <a style="background: none !important;color:black;">
                                            <span><a class="no-styleing" href="<?php echo e(route('home')); ?>">
                                                    <?php echo e($user->fname); ?></span></a></li>
                                    <div class="dropdown ml-auto">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <div class="dropdown-content">
                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();
                                                                                                            document.getElementById('logout-form').submit();">
                                                <?php echo e(__('Logout')); ?>

                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>

                                        </div>
                                    </div>

                                </ul>

                                <?php
                                break;
                                }
                                ?>





                            </div>
                            <?php endif; ?>
                        </div> <!-- header right -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php echo e(route('homee')); ?>">
                                <img src="<?php echo e(asset('asset/images/logo1.png')); ?>" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">



                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="<?php echo e(Request::routeIs('homee') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('homee')); ?>"><?php echo app('translator')->get('home.home_menu'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('howitworks')); ?>"
                                            class="<?php echo e(Request::routeIs('howitworks') ? 'active' : ''); ?>"><?php echo app('translator')->get('home.HOW_IT_WORKS'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('students')); ?>"
                                            class="<?php echo e(Request::routeIs('students') ? 'active' : ''); ?>"><?php echo app('translator')->get('home.FOR_STUDENTS'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('teachers')); ?>"
                                            class="<?php echo e(Request::routeIs('teachers') ? 'active' : ''); ?>"><?php echo app('translator')->get('home.FOR_Teachers'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('parents')); ?>"
                                            class="<?php echo e(Request::routeIs('parents') ? 'active' : ''); ?>"><?php echo app('translator')->get('home.FOR_PARENTS'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('mockupschedule')); ?>"
                                            class="<?php echo e(Request::routeIs('mockupschedule') ? 'active' : ''); ?>"><?php echo app('translator')->get('home.SCHEDULE'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('donate')); ?>"
                                            class="<?php echo e(Request::routeIs('donate') ? 'active' : ''); ?> customClass"
                                            style="background-color: #ffc10e;padding: 12px 40px 12px 40px;color: white;border-radius: 6px;color:#000000;">Donate</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
    
    <div class="row p-0 m-0">
        <div class="col-2"></div>
        <div class="col-8">
            <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Session::has('alert-' . $msg)): ?>
            <div class="flash-message mt-5" id='success-alert'>

                <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?> <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-2"></div>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
    

    <!--====== COURSE PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer-part customFooter">
        <div class="footer-top pt-40 pb-70">
            <div class="container cuContainerM">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-section-wrap footer-link mt-40">
                            <div class="logo" style="float: left;">

                                <a href="<?php echo e(route('homee')); ?>"><img src="<?php echo e(asset('asset/images/footerlogo.png')); ?>"
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
                                <li><a href="<?php echo e(route('page.show', 'terms-and-conditions')); ?>">Terms and Conditions </a>
                                </li>
                                <li><a href="<?php echo e(route('page.show','privacy-policy')); ?>">Privacy Policy</a></li>
                                <li><a href="#">Cookies Policy</a></li>

                            </ul>

                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-link support mt-40">

                            <ul class="text-center">
                                <li><a href="<?php echo e(route('howitworks')); ?>">How it Works</a></li>
                                <li><a href="<?php echo e(route('teachers')); ?>">For Teachers</a></li>
                                <li><a href="<?php echo e(route('students')); ?>">For Students</a></li>

                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="footer-link support mt-40">

                            <ul class="text-center">
                                <li><a href="<?php echo e(route('parents')); ?>">For Parents </a></li>
                                <li><a href="<?php echo e(route('donate')); ?>">Donate</a></li>
                                <li><a href="#">Contact Us</a></li>

                            </ul>
                        </div> <!-- support -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        
        <!--====== FOOTER PART ENDS ======-->

        <!--====== BACK TO TP PART START ======-->

        <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
        <!--====== jquery js ======-->
        <script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>
        

        <!--====== Bootstrap js ======-->
        <script src="<?php echo e(asset('asset/js/bootstrap.min.js')); ?>"></script>

        <!--====== Slick js ======-->
        <script src="<?php echo e(asset('asset/js/slick.min.js')); ?>"></script>

        <!--====== Magnific Popup js ======-->
        <script src="<?php echo e(asset('asset/js/jquery.magnific-popup.min.js')); ?>"></script>

        <!--====== Counter Up js ======-->
        
        <script src="<?php echo e(asset('asset/js/jquery.counterup.min.js')); ?>"></script>

        <!--====== Nice Select js ======-->
        <script src="<?php echo e(asset('asset/js/jquery.nice-select.min.js')); ?>"></script>

        <!--====== Nice Number js ======-->
        <script src="<?php echo e(asset('asset/js/jquery.nice-number.min.js')); ?>"></script>

        <!--====== Count Down js ======-->
        <script src="<?php echo e(asset('asset/js/jquery.countdown.min.js')); ?>"></script>

        <!--====== Ajax Contact js ======-->
        <script src="<?php echo e(asset('asset/js/ajax-contact.js')); ?>"></script>

        <!--====== Main js ======-->
        <script src="<?php echo e(asset('asset/js/main.js')); ?>"></script>

        <!--====== Map js ======-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
        <script src="<?php echo e(asset('asset/js/map-script.js')); ?>"></script>

        <script src="https://kit.fontawesome.com/0141eabd3d.js" crossorigin="anonymous"></script>
        <?php echo $__env->yieldContent('js'); ?>
        <script>
            // Material Select Initialization
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        });
        $('.navbar-nav').on('click', 'li', function(){
        $('.navbar-nav li.active').removeClass('active');
        $(this).addClass('active');
        });
        // $('.mdb-select').materialSelect();
    });
    /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) { txtValue=a[i].textContent || a[i].innerText; if
            (txtValue.toUpperCase().indexOf(filter)> -1) {
            a[i].style.display = "";
            } else {
            a[i].style.display = "none";
            }
            }
            }
        </script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
</html>
<?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/layouts/master.blade.php ENDPATH**/ ?>