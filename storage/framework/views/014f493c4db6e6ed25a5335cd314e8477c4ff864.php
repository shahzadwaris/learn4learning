<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->
<?php $__env->startSection('content'); ?>
<div class="search-box">
    <div class="search-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- search form -->
</div>

<!--====== SEARCH BOX PART ENDS ======-->

<!--====== SLIDER PART START ======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-size:auto !important;background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/parents/parents-banner.png')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s"><?php echo e($data[0]['title']); ?></h1>
                        <p data-animation="fadeInUp" data-delay="1.5s"><?php echo e($data[0]['discription']); ?></p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>



<!--====== SLIDER PART ENDS ======-->

<section id="teachers-part" class="pt-70 pb-120  parent-sec-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 parent-sec-1-left">
                <img src="<?php echo e(asset('asset/images/parents/inspirational-teachers.png')); ?>" alt="">
            </div>
            <div class="col-lg-5  parent-sec-1-right">
                <div class="section-title mt-50">
                    <h2><?php echo e($data[1]['title']); ?></h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p><?php echo e($data[1]['discription']); ?></p>
                </div> <!-- teachers cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section id="teachers-part" class="pt-70 pb-120 parent-sec-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 parent-sec-2-left">
                <div class="section-title mt-50">
                    <h2><?php echo e($data[2]['title']); ?></h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p><?php echo e($data[2]['discription']); ?></p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1 parent-sec-2-right">
                <img src="<?php echo e(asset('asset/images/parents/learn-at-home.png')); ?>" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!--====== CATEGORY PART START ======-->
<!--====== CATEGORY PART ENDS ======-->
<!--====== ABOUT PART START ======-->
<section id="teachers-part" class="pt-70 pb-120 parent-sec-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 parent-sec-3-left">
                <img src="<?php echo e(asset('asset/images/parents/track-attainment.png')); ?>" alt="">
            </div>
            <div class="col-lg-5 parent-sec-2-right">
                <div class="section-title mt-50">
                    <h2><?php echo e($data[3]['title']); ?></h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p><?php echo e($data[3]['discription']); ?></p>
                </div> <!-- teachers cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<section id="teachers-part" class="pt-70 pb-120 parent-sec-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 parent-sec-4-left">
                <div class="section-title mt-50">
                    <h2><?php echo e($data[4]['title']); ?></h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p><?php echo e($data[4]['discription']); ?></p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1 parent-sec-4-right">
                <img src="<?php echo e(asset('asset/images/parents/homework-assignment.png')); ?>" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<!--====== COURSE PART ENDS ======-->
<section id="teachers-part" class="pt-70 pb-120 parents-last-sec-last">
    <div class="container" style="padding:0px;min-width: 100%">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 parent-sec-last-left">
                <img src="<?php echo e(asset('asset/images/teachers/tutoring.png')); ?>" alt="">
            </div>
            <div class="col-lg-6 parent-sec-last-right" style="background-color: #006796;;padding: 61px;">
                <div class="section-title mt-50">
                    <h2><?php echo e($data[5]['title']); ?></h2>
                    <h5 class="learn-line-yellow"></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p style="color: white"><?php echo e($data[5]['discription']); ?></p>
                </div> <!-- teachers cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== REGISTER PART START======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-size: auto !important;background-repeat: no-repeat; padding-bottom: 150px; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/teachers/teacher-bottom-banner.png')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s"><?php echo e($data[6]['title']); ?></h1>
                        <p data-animation="fadeInUp" data-delay="1.5s"><?php echo e($data[6]['discription']); ?></p>
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn"
                            href="<?php echo e(route('register')); ?>"
                            style="background: white;color: black;font-weight: 500;">REGISTER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .section-title h5::before {
        left: 12px;
    }

    .container {}

    .section-title .learn-line-yellow::before {
        background-color: #fff;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/parents.blade.php ENDPATH**/ ?>