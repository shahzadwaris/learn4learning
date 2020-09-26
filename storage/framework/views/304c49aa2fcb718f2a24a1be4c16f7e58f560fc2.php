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
                                    <li><a href="<?php echo e(route('login')); ?>" style="background: none !important;color:black;">SIGN IN</a></li>
                                    <li><a href="<?php echo e(route('register')); ?>">SIGN UP</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                                 <?php if(Auth::check()): ?>
                 <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="    margin-top:px;
">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" style="color: black" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo app('translator')->get('home.Language'); ?> <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(url('/locale/en')); ?>"><img src="<?php echo e(asset('asset/images/flag/us.png')); ?>" width="30px" height="20x"> English</a>
                                <a class="dropdown-item" href="<?php echo e(url('/locale/fr')); ?>"><img src="<?php echo e(asset('asset/images/flag/fr.png')); ?>" width="30px" height="20x"> French</a>
                                                   </div>
                        </li>
                    </ul>
        
        </nav>
                                <div class="login-register" style="margin-top: 10px">

                                    <ul>

                                        <li><a style="background: none !important;color:black;"><?php echo e(Auth::user()->fname); ?></a></li>
                                              <li>
                                                <form method="post" action="<?php echo e(route('logout')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn-sm btn-outline-primary">logout</button>
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
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                          <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="active" href="<?php echo e(route('teacherHome')); ?>"><?php echo app('translator')->get('home.home_menu'); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('teacherSchedule')); ?>">SCHEDULE</a>
                                    </li>
                   
                             

                                             <li class="nav-item">
                                        <a href="<?php echo e(route('Students')); ?>">STUDENT</a>
                                    </li>
<!-- 
                        <li class="nav-item">
                                        <a href="<?php echo e(route('getdataofstudent')); ?>">STUDDENTS</a>
                          </li> -->


                               
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('teacherHomeWork')); ?>">HOMEWORK</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('MYaccount')); ?>">Account</a>
                                    </li>
                                        <li class="nav-item">
                                        <a href="<?php echo e(route('Students')); ?>">MESSAGES</a>
                                    </li>
                  
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('donate')); ?>" style="background-color: #ffc10e;padding: 12px 40px 12px 40px;margin: 19px 2px 2px 2px;color: white;border-radius: 6px;">DONATE</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>


<?php echo $__env->yieldContent('content'); ?>


<!--====== COURSE PART ENDS ======-->

<!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-section-wrap footer-link mt-40">
                            <div class="logo" style="float: left;">

                                <a href="<?php echo e(route('homee')); ?>"><img src="<?php echo e(asset('asset/images/footerlogo.png')); ?>" alt="Logo"></a>
                            </div>

                          <div class="right-inner-div ml-3">
                        
                            <ul style="margin-left: 23px">
                                  <li><a href="#">Teachers</a></li>
                                  <li><a href="#">About US</a></li>
                                  <li><a href="#">Subjects</a></li>
                          
                            </ul>
                            
                        </div>
                  
                        </div>
                    </div>
        
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-link mt-40">
                        
                            <ul>
                               <li><a href="#">Teachers</a></li>
                                <li><a href="#">About US</a></li>
                                <li><a href="#">Subjects</a></li>
                      
                            </ul>
                            
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-link support mt-40">
                      
                            <ul>
                                <li><a href="#">Teachers</a></li>
                                <li><a href="#">About US</a></li>
                                <li><a href="#">Subjects</a></li>
                 
                            </ul>
                        </div> <!-- support -->
                    </div>
                     <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="footer-link support mt-40">
                          
                            <ul>
                                <li><a href="#">Levels</a></li>
                                <li><a href="#">Contact US</a></li>
                                <li><a href="#">Login</a></li>
                     
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
<script src="<?php echo e(asset('asset/js/vendor/jquery-1.12.4.min.js')); ?>"></script>

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
        $('.mdb-select').materialSelect();
    });
</script>
</body>


<!-- Mirrored from thepixelcurve.com/html/edubin/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jun 2020 12:44:37 GMT -->
</html>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <form  method="post" action="<?php echo e(route('Add_experience')); ?>" id="form">
            <?php echo csrf_field(); ?>

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
                                   <div class="form-group">
                                       
                                       <input type="text" name="exp" placeholder="Enter Experience" class="form-control" required="true">
                                   </div>
<!--                                     <div class="form-group">
                                       
    <input class="form-control" name="date" id="registration-date" type="date" required="true">                                   </div> -->



      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>

      </div>
                                      </form>

    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\learnforlearning\resources\views/layouts/teachersmaster.blade.php ENDPATH**/ ?>