
<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->
<?php $__env->startSection('content'); ?>
    <style>
        .section-title h5::before {
            left: 12px;
        }

        .container{

        }

        .section-title .learn-line-yellow::before{
            background-color: #fff;
        }
    </style>
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
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/schedule/banner.jpg')); ?>">
            <div class="container" >
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

    <section id="teachers-part" class="pt-70 pb-120 sched-sec-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 sched-sec-1-left">
                    <div class="section-title mt-50">
                        <h2 style="border-left: 49px solid #f9c033;padding-left: 15px;"><?php echo e($data[1]['title']); ?></h2>
                        <h5 style="border-left: 49px solid #f9c033;"></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont" style="border-left: 49px solid #f9c033;padding-left: 15px;">
                        <p><?php echo e($data[1]['discription']); ?></p>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6 offset-lg-1 sched-sec-1-right">
                    <img src="<?php echo e(asset('asset/images/schedule/search-results.jpg')); ?>" alt="">
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="teachers-part" class="pt-70 pb-120 sched-sec-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 sched-sec-2-left" >
                    <img src="<?php echo e(asset('asset/images/schedule/subject.jpg')); ?>" alt="">
                </div>
                <div class="col-lg-5 sched-sec-2-right">
                    <div class="section-title mt-50">
                        <h2><?php echo e($data[2]['title']); ?></h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p><?php echo e($data[2]['discription']); ?></p>
                    </div> <!-- teachers cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== CATEGORY PART START ======-->
    
    
    
    <section id="for-std-sec-3" class="pt-70 pb-120 sched-sec-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-5  sched-sec-3-left">
                    <div class="section-title mt-50">
                        <h2><?php echo e($data[3]['title']); ?></h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p><?php echo e($data[3]['discription']); ?></p>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6 offset-lg-1 sched-sec-3-right">
                    <img src="<?php echo e(asset('asset/images/schedule/teacher.jpg')); ?>" alt="">
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== CATEGORY PART ENDS ======-->
    <!--====== ABOUT PART START ======-->
    <section id="teachers-part" class="pt-70 pb-120 sched-sec-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 sched-sec-4-left" >
                    <img src="<?php echo e(asset('asset/images/schedule/time-available.jpg')); ?>" alt="">
                </div>
                <div class="col-lg-5 sched-sec-4-right">
                    <div class="section-title mt-50">
                        <h2 style="text-decoration-color: #0b2a41"><?php echo e($data[4]['title']); ?></h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p><?php echo e($data[4]['discription']); ?></p>
                    </div> <!-- teachers cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== COURSE PART ENDS ======-->

    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; padding-bottom: 50px; padding-top: 40px; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/slider/banner.jpg')); ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h1 data-animation="fadeInUp" data-delay="1s"><?php echo e($data[4]['title']); ?></h1>
                            <p data-animation="fadeInUp" data-delay="1.5s"><?php echo e($data[4]['discription']); ?></p>
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn  bottom-slider-std-par" href="#">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn bottom-slider-teach" href="#" style="">I AM A TEACHER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/mockup-schedule.blade.php ENDPATH**/ ?>