
<?php $__env->startSection('title','Teacher Profile'); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/teacher-profile1.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min-for-teacher-homepage.css')); ?>">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    
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



<section class="dashboard-section">
    <div class="container">
        <div class="row d-flex justify-content-center text-center h-100">
            <div class="col-12" id="std-dashboard-left">
                <div class="stu-home-dash-head-div">
                    <p class="stu-home-dash-head-head">Student PROFILE</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 justify-content-center text-center">
                        <img src="<?php echo e(asset('asset/images/student-homepage/child.jpg')); ?>" alt="" id="stud-profile-pic">
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12 justify-content-center text-center">
                        <p class="stud-name">Name: &nbsp;&nbsp; <?php echo e($getrecordindividulStuRecord[0]->fname); ?></p><br>
                        <p class="stud-date"><b>Country:&nbsp;&nbsp;</b> <?php echo e($getrecordindividulStuRecord[0]->country); ?></p><br>                      
                            <p class="stud-date"><b>Education:</b> Master Degree</p><br>   
                        <p class="stud-date">Title:&nbsp;&nbsp;<?php echo e($getrecordindividulStuRecord[0]->title); ?></p>    <br>            
                        <p class="stud-date"><b>Subjects:&nbsp;&nbsp;</b><?php echo e($getrecordindividulStuRecord[0]->Subject_name); ?></p>    <br>             
                        <p class="stud-date"><b>Levels Taught:&nbsp;&nbsp; </b><?php echo e($getrecordindividulStuRecord[0]->level_name); ?></p>    <br>             
                        <p class="stud-date"><b>Description:&nbsp;&nbsp; </b> <?php echo e($getrecordindividulStuRecord[0]->description); ?> </p><br>
                        <div class="col-12 col-12" id="donate-register-btn-div">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="<?php echo e(route('Contact.Student', [$getrecordindividulStuRecord[0]->user_id])); ?>" id="donate-register-btn">CONTACT</a>
                        </div>
                    </div>
                </div>                
            </div>            
        </div>
    </div>
</section>


<!--Carousel Wrapper-->





    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/teachers/individualrecord.blade.php ENDPATH**/ ?>