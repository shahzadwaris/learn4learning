
<?php $__env->startSection('title','Teacher Profile'); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/teacher-profile.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min-for-teacher-homepage.css')); ?>">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <style>
        #_prof_img{
            height: 250px;
            width: 250px;
            border-radius: 50%;
            border: 5px solid #fff;
            background-size: cover;
        }
        .slick-track{
            height: 700px;
        }
        @media(max-width: 991px)
        {
            #customFooter{
                width: 102%;
            }
        }
    </style>    
    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/teacher-homepage/teaching_banner.jpg')); ?>">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">                        
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
<!-- Card -->



<section class="dashboard-section" style="margin-top: -450px;">
    <div class="container">
        <div class="row d-flex justify-content-center text-center h-100">
            <div class="col-12" id="std-dashboard-left">
                <div class="stu-home-dash-head-div">
                    <p class="stu-home-dash-head-head">TEACHER PROFILE</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 justify-content-center text-center">
                        <div class="d-inline-block" id="_prof_img" style="background-image: url('<?php echo e(url('/storage/images/'.$teacherdata->thumbnail)); ?>');">
                            
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 justify-content-center text-center">
                        <p class="stud-date">Name:&nbsp;&nbsp;  <?php echo e($teacherdata->fname); ?></p><br>
                        <p class="stud-date">Last Name:&nbsp;&nbsp; <?php echo e($teacherdata->lname); ?></p><br>
                        <p class="stud-date">Subject: &nbsp;&nbsp;
                            <?php $__currentLoopData = $teacherdata->subject_level_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($t->Getsubject) && !empty($t->Getlevel)): ?>
                                      <?php echo e($t->Getsubject->name); ?> <?php echo e($t->Getlevel->name); ?>, 
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p><br>
                        
                        <p class="stud-date">Email: &nbsp;&nbsp;<?php echo e($teacherdata->email); ?></p><br>
                        <p class="stud-date">Type: &nbsp;&nbsp;<?php echo e($teacherdata->type); ?></p><br>
                        <p class="stud-date">Experience:&nbsp;&nbsp;<?php echo e($teacherdata->experience); ?></p><br>


                        <p class="stud-date"><b>Country&nbsp;&nbsp;</b><?php echo e($teacherdata->country); ?></p><br>                      
             
                        <p class="stud-date"><b>Available for 1:1: </b> Yes</p>    <br>

                        <div class="col-12 col-12" id="donate-register-btn-div">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="<?php echo e(url('update-teachere-profile')); ?>" id="donate-register-btn">Edit Profile</a>
                        </div>
                    </div>
                </div>                
            </div>            
        </div>
    </div>
</section>


<!--Carousel Wrapper-->





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/teachers/account.blade.php ENDPATH**/ ?>