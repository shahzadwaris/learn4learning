<?php $__env->startSection('title','level'); ?>
<?php $__env->startSection('content'); ?>


<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/student-lesson-search/banner.jpg')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="What are you looking for?">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>
<!-- Card -->
<section id="course-part" class=" bg_cover gray-bg">
    <section id="course-part" class=" bg_cover gray-bg"
        style="background-image: url(<?php echo e(asset('asset/images/teacher-homepage/grades-carousel-bgimg.png')); ?>">
        <div class="container">
            <div class="teacher-grade-dash-head-div">
                <p class="teacher-grade-dash-head">MY GRADES</p>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-lg-6 col-md-6 col-sm-6 item">
                    <div class="pad15">
                        <div class="card box-shadow">
                            <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details"
                                id="grade-btn-teach">Grades</p>
                            <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="grades-details"><?php echo e($grade->Subject_name); ?>

                                <span><?php echo e($grade->grade == '' ? 'Not Graded Yet' : $grade->grade); ?></span></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/student-homepage.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('asset/css/teacher-homepage.css')); ?>">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style type="text/css">
    .schedules .card {
        height: auto;
    }

    .spacing-top {
        margin-top: 20px;
    }

    .card-img-top {
        height: 111px;
        width: 144px;
    }

    #donate-register-btn-div {
        display: block !important;
    }

    .image-card {
        max-width: 400px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/students/grades.blade.php ENDPATH**/ ?>