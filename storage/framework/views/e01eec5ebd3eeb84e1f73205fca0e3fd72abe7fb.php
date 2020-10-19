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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
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

<style>

      @media( max-width: 575px)
      {
        .footer-link ul li {
            line-height: 35px;
            text-align: left;
        }
        .customTFooter{
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

<body>
    <header id="header-part" class="header-two">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header-contact">
                        </div> <!-- header contact -->
                    </div>
                    <div class="col-md-6">
                        <div class="header-right d-flex justify-content-end">
                            <?php if(!Auth::check()): ?>
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
                                    <li><a href="<?php echo e(route('login')); ?>"
                                            style="background: none !important;color:black;">SIGN IN</a></li>
                                    <li><a href="<?php echo e(route('register')); ?>">SIGN UP</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::check()): ?>
                            <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="margin-top:px;">
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
                            <div class="login-register" style="margin-top: 10px">
                                <ul>
                                    <li><a style="background: none !important;color:black;"><?php echo e(Auth::user()->fname); ?></a>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                            style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div> <!-- header right -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
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
                                        <a class="<?php echo e(Request::routeIs('teacherHome') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('teacherHome')); ?>"><?php echo app('translator')->get('home.home_menu'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(Request::routeIs('teacherSchedule') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('teacherSchedule')); ?>">SCHEDULE</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(Request::routeIs('Students') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('Students')); ?>">STUDENT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(Request::routeIs('teacherHomeWork') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('teacherHomeWork')); ?>">HOMEWORK</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(Request::routeIs('MYaccount') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('MYaccount')); ?>">Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(Request::routeIs('Students') ? 'active' : ''); ?>"
                                            href="<?php echo e(route('Students')); ?>">MESSAGES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo e(Request::routeIs('donate') ? 'active' : ''); ?> customClass"
                                            href="<?php echo e(route('donate')); ?>"
                                            style="background-color: #ffc10e;padding: 12px 40px 12px 40px;color: white;border-radius: 6px;">DONATE</a>
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
            <?php if(Session::has('success-alert-message-teac')): ?>
            <div class="flash-message mt-5" id='success-alert'>
                <p class="alert alert-success"><?php echo e(Session::get('success-alert-message-teac')); ?> <a href="#" class="close"
                        data-dismiss="alert" aria-label="close">&times;</a></p>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
    <!--====== FOOTER PART START ======-->
    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container customTFooter">
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
                    <div class="col-lg-3 col-md-6 col-sm-12" customSideLeft>
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
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright  text-center pt-15">
                            <p>&copy;<?php echo app('translator')->get('footer.footer_info'); ?>
                                &nbsp; - &nbsp; <?php echo app('translator')->get('footer.Designed_by'); ?> <span>Rkixtech</span>
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
    <script src="<?php echo e(asset('asset/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('asset/js/jquery.min.js')); ?>"></script>
    <!--====== Bootstrap js ======-->
    <script src="<?php echo e(asset('asset/js/bootstrap.min.js')); ?>"></script>
    <!--====== Slick js ======-->
    <script src="<?php echo e(asset('asset/js/slick.min.js')); ?>"></script>
    <!--====== Magnific Popup js ======-->
    <script src="<?php echo e(asset('asset/js/jquery.magnific-popup.min.js')); ?>"></script>
    <!--====== Counter Up js ======-->
    <script src="<?php echo e(asset('asset/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/js/jquery.counterup.min.js')); ?>"></script>
    <!--====== Nice Select js ======-->
    <script src="<?php echo e(asset('asset/js/jquery.nice-select.min.js')); ?>"></script>
    <!--====== Nice Number js ======-->
    <script src="<?php echo e(asset('asset/js/jquery.nice-number.min.js')); ?>"></script>
    <!--====== Count Down js ======-->
    <script src="<?php echo e(asset('asset/js/jquery.countdown.min.js')); ?>"></script>
    <!--====== Validator js ======-->
    <script src="<?php echo e(asset('asset/js/validator.min.js')); ?>"></script>
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
        $('.mdb-select').materialSelect();
    });
});
    </script>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="<?php echo e(route('Add_experience')); ?>" id="form">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="exp" placeholder="Enter Experience" class="form-control"
                                required="true">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
</html>
<?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/layouts/teachersmaster.blade.php ENDPATH**/ ?>