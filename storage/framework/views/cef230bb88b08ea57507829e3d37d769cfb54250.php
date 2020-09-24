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

.dropdown-content {
  display: none;
  position: absolute;
  border: 1px solid #ffc10e;
  background-color: white;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
    <header id="header-part" class="header-two">
        
        <div class="header-top d-none d-lg-block" style="padding-bottom: 22px">
            <div class="container" style="margin-top: 14px">
                <div class="row">
                    <div class="col-md-6">

                    </div>
   
                    <div class="col-md-6">
                        <div class="header-right d-flex justify-content-end">

                            <?php if(!Auth::check()): ?>
          
                            <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="    margin-top: -14px;">

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
                                    <li><a href="<?php echo e(route('login')); ?>" style="background: none !important;color:black;"><?php echo app('translator')->get('home.SIGN_IN'); ?></a></li>
                                    <li><a href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('home.SIGN_UP'); ?></a></li>
                                </ul>
                            </div>
                                    <?php endif; ?>
                                    <?php if(Auth::check()): ?>
           <nav class="navbar navbar-expand-md navbar-light navbar-laravel " style="    margin-top: -14px;">

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
                                <div class="login-register" style="margin-right: 30px">
                                  
                           <?php $AuthCjchk= Auth::User()->id; 
                           $getdata=DB::table('users')->where('id', $AuthCjchk)->Select('type')->get();
                               switch ($getdata[0]->type) {
                                   case 'teacher':?>
                                                    <ul>
                                        <li><a style="background: none !important;color:black;">
                                            <span><a class="no-styleing" href="<?php echo e(route('teacherHome')); ?>"> <?php echo e(Auth::user()->fname); ?></span></a></li>
                                            <div class="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <div class="dropdown-content">
                                        <p><a style="color: black" href="<?php echo e(route('teacher_edit_profile')); ?>"><?php echo app('translator')->get('home.Edit_Profile'); ?></a></p>
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
                                        <li><a style="background: none !important;color:black;">
                                            <span><a class="no-styleing" href="<?php echo e(route('studentHome')); ?>"> <?php echo e(Auth::user()->fname); ?></span></a></li>
                                            <div class="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <div class="dropdown-content">
                                        <p><a style="color: black" href="<?php echo e(route('student_edit_profile')); ?>"><?php echo app('translator')->get('home.Edit_Profile'); ?></a></p>
                                   <form method="post" action="<?php echo e(route('logout')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn-sm btn-outline-primary">logout</button>
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
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">



                                <ul class="navbar-nav ml-auto">
                                 <li class="nav-item">
                                        <a class="active" href="<?php echo e(route('homee')); ?>"><?php echo app('translator')->get('home.home_menu'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('howitworks')); ?>"><?php echo app('translator')->get('home.HOW_IT_WORKS'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('students')); ?>"><?php echo app('translator')->get('home.FOR_STUDENTS'); ?></a>
                                       </li>
                                      <li>
                                         <a href="<?php echo e(route('teachers')); ?>"><?php echo app('translator')->get('home.FOR_Teachers'); ?></a>
                                       </li>
                                      <li>
                                        <a href="<?php echo e(route('parents')); ?>"><?php echo app('translator')->get('home.FOR_PARENTS'); ?></a>
                                       </li>
                                       <li>
                                        <a href="<?php echo e(route('mockupschedule')); ?>"><?php echo app('translator')->get('home.SCHEDULE'); ?></a>
                                       </li>
                                      <li>
                                        <a href="<?php echo e(route('donate')); ?>" style="background-color: #ffc10e;padding: 12px 40px 12px 40px;margin: 19px 2px 2px 2px;color: white;border-radius: 6px;color:#000000;">Donate</a>
                                    </li>
                                </ul>

<script>
$('.navbar-nav').on('click', 'li', function(){
    $('.navbar-nav li.active').removeClass('active');
    $(this).addClass('active');
});
</script>




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
     =
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



<script>
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
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script><?php /**PATH C:\wamp64\www\learnforlearning\resources\views/layouts/master.blade.php ENDPATH**/ ?>