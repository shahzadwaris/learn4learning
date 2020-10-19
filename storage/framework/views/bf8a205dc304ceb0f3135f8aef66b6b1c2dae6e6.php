<?php $__env->startSection('title','Student Homepage'); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $user = Auth::user();
    ?>
    <style>
        .customFaCheck{
            font-size: 173px;
            color: #fff;
            margin-bottom: 10px;
        }
        #achieve-div{
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        @media (max-width: 991px) {
            #achieve-div{
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                flex: 100%;
                max-width: 100%;
            }
            div#std-dashboard-right{
                flex: 100%;
                max-width: 100%;
            }
            #std-dashboard-left{
                flex: 100%;
                max-width: 100%;
            }
            #schedule-div{
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                flex: 100%;
                max-width: 100%;
            }
            #grades-div{
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                flex: 100%;
                max-width: 100%;
            }
            #homework-div{
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                flex: 100%;
                max-width: 100%;
            }

        }
        @media (max-width: 575px) {
            .customFieldSearch{
                padding: 0px;
                max-width: 100%;
                margin: 0px !important;
                width: 100%;
                flex: 100%;
                padding: 0px !important;
            }
            .customClassMySch{
                flex:100%;
                max-width: 100%;
                width: 100%;
                margin-bottom: 5px;
            }
        }
        .customStyleImage{
            width: 140px;
            height: 140px;
        }
        .customAlertDAngerContainer{
            display: flex;
            justify-content: center;
        }
        .customDanger{
            background-color: #ffc10e;
            color: #fff;
            width: 100%;
            font-size: 1rem;
            padding: .75rem 1.25rem;
            border: 1px solid transparent;
        }
        .customAlertDAnger{
            background-color: #ffc10e;
            color: #fff;
            width: 100%;
            font-size: 1rem;
            padding: .75rem 1.25rem;
            border: 1px solid transparent;
        }
        .customDangerContainer{
            display: flex;
            justify-content: center;
        }
    </style>
    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150"
             style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/student-lesson-search/banner.jpg')); ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h3 class="std-welcome-msg text-white"><?php echo e($user->fname); ?><br>
                                Welcome back!</h3>
                            <div class="row">
                                
                                <div class="col-7 ml-5 pl-5 customFieldSearch">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="What are you looking for?">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
    <!-- Card -->
    
    <section class="dashboard-section" style="margin-top: -10%;">
        <div class="container">
            <div class="row d-flex justify-content-center text-center h-100">
                <div class="col-6 " id="std-dashboard-left">
                    <div class="stu-home-dash-head-div">
                        <p class="stu-home-dash-head-head">MY DASHBOARD</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <?php
                                $usersimgg = $user;
                            ?>
                            <img src="<?php echo e(url('/storage/images/'. (!empty($usersimgg[0]->thumbnail) ? $usersimgg[0]->thumbnail : 'default.png') )); ?>"
                                 alt="stud-profile-pic" class="customStyleImage">
                        </div>
                        <div class="col-lg-8 col-sm-12 col-xs-12">
                            <p class="stud-name">Hi-<?php echo e($user->fname); ?></p>
                            <p class="stud-date">23/01/2012</p><br><br>
                            <a href="#" class="stu-fav-subj-link w-100 text-left" style="">My Favourite
                                Subjects</a>
                            <p class="stu-fav-subj-list w-100 text-left"><?php echo e($user->favorite_subject); ?></p>
                            <p class="points-para w-100 text-left">5000 points</p>
                        </div>
                    </div>
                </div>
                <div class="col-6" id="std-dashboard-right">
                    <div class="row">
                        <div class="col-6 p-3" id="achieve-div">
                            <i class="far fa-check-circle customFaCheck"></i>
                            <p>MY<br>ACHIEVEMENTS</p>
                        </div>
                        <div class="col-6 p-3" id="schedule-div">
                            <a href="<?php echo e(route('student_schedule')); ?>">
                                <img src="<?php echo e(asset('asset/images/student-homepage/schedule.png')); ?>" alt="">
                                <p>MY<br>SCHEDULE</p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-3" id="grades-div">
                            <a href="<?php echo e(route('grade.index')); ?>">
                                <img src="<?php echo e(asset('asset/images/student-homepage/grades.png')); ?>" alt="">
                                <p>MY<br>GRADES</p>
                            </a>
                        </div>
                        <div class="col-6 p-3" id="homework-div">
                            <a href="<?php echo e(route('studetnsHomeWork')); ?>">
                                <img src="<?php echo e(asset('asset/images/student-homepage/homework.png')); ?>" alt="">
                                <p>MY<br>HOMEWORK</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="carousel-achieve">
        <div class="container">
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $MyAchivment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Achivment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--First slide-->
                        <div class="carousel-item active">
                            <div class="col-md-2">
                                <img class="card-img-top" src="<?php echo e(url('/storage/images/'.$Achivment->img)); ?>"
                                     alt="Card image cap">
                            </div>
                        </div>
                        <!--/.Third slide-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </section>
    <!--Carousel Wrapper-->
    <section class="schedules">
        <div class="container">
            <h5 class="schedule-heading-teacher-homepage">My Schedule</h5>
            <hr class="teacher-home-schedule-hr">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-12 col-md-8 text-center mb-2 mt-2">
                    <div class="row">
                        <?php if(count($Book) == 0): ?>
                            <div class="alert alert-danger customDanger">
                                <div class="container customDangerContainer">
                                    <div class="alert-icon">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    </div>&nbsp;&nbsp;&nbsp;No Schedule Found
                                </div>
                                <?php else: ?>
                                    <?php $__currentLoopData = $Book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-4 customClassMySch">
                                            <!-- Card -->
                                            <div class="card">
                                                <!-- Card image -->
                                                <a href="#">
                                                    <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                                                        <h4 class="card-title"><?php echo e(date('l d/m',strtotime($book->date))); ?></h4>
                                                    </div>
                                                </a>
                                                <!-- Card content -->
                                                <div class="card-body">
                                                    <!-- Title -->
                                                    <p class="teach-shed-card-content">
                                                        <?php echo e(date('h:i ',strtotime($book->time))); ?> <?php echo e($book->subject->name); ?>

                                                    </p>
                                                    <br>
                                                </div>
                                                <!-- Card footer -->
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                    </div>
                    <?php if(count($Book) != 0): ?>
                        <div class="col-12 col-12 justify-content-center text-center" id="donate-register-btn-div"
                             style="margin-top: 10px">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2"
                               href="<?php echo e(route('student_schedule')); ?>" id="donate-register-btn">SEE
                                ALL</a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
    </section>
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
                                   id="grade-btn-teach">REPORT CARD MARCH</p>
                                <?php if(count($MyAchivment) == 0): ?>
                                    <div class="alert alert-danger customAlertDAnger">
                                        <div class="container customAlertDAngerContainer">
                                            <div class="alert-icon">
                                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;No Schedule Found
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php $__currentLoopData = $MyAchivment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="grades-details"><?php echo e($item->Subject_name); ?>

                                            <span><?php echo e($item->grade == '' ? 'Not Graded Yet' : $item->grade); ?></span></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(count($MyAchivment) != 0): ?>
                                    <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details"
                                           href="<?php echo e(route('grade.index')); ?>" id="donate-register-btn">SEE ALL</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg"
             style="background-image: url(images/course/course-shape.png)">
        <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg"
                 style="background-image: url(images/course/course-shape.png)">
            <div class="container">
                <div class="teacher-homework-dash-head-div">
                    <p class="teacher-homework-dash-head"><?php echo app('translator')->get('teacherhome.MY_HOMEWORK'); ?></p>
                    <hr>
                </div>
                <div class="row text-center">
                    <div class="MultiCarousel" style="display: flex;
justify-content: center;" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                        <div class="MultiCarousel-inner">
                            <?php $__currentLoopData = $studentHomeworks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $homework): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $date = strtotime(date('Y-m-d'));
                                    $due = strtotime($homework->date);
                                    $type = 'Submiited';
                                    $status = '';

                                    if($date == $due)
                                    {
                                    $type = 'fa-exclamation';
                                    $styles = "background-color: #ff0000;padding: 20px 27px;border-radius: 33px;";
                                    $status = 'Due Today ' .' '. date('m/d', strtotime($homework->date));
                                    }
                                    else if($date < $due) { $type='' ; $status='Due' . date('m/d', strtotime($homework->date));
                                        $styles = "";
                                        }else{
                                        $styles = "background-color: green;
                                        padding: 20px 27px;
                                        border-radius: 33px;";
                                        $status = 'fa-check';
                                        }
                                ?>
                                <div class="item">
                                    <div class="pad15">
                                        <div class="card postion-relative">
                                            <img src="<?php echo e(url('/storage/images/'.$homework->thumbnail)); ?>" class="image-card"
                                                 alt="Bologna">
                                            <div
                                                class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                                <div class="topright"><span class="exclamation-para"><?php echo e($status); ?></span><i
                                                        class="fa <?php echo e($type); ?>" aria-hidden="true" style="<?php echo e($styles); ?>"></i>
                                                </div>
                                                <div style="margin-bottom: 217px;">
                                                    <h6 class="card-subtitle mb-2"><?php echo e($homework->subject->name); ?></h6>
                                                    <p class="card-subtitle mb-3"><?php echo e($homework->teacher->fname); ?></p>
                                                </div>
                                            </div>
                                            <a data-animation="fadeInUp" data-delay="2s"
                                               class="main-slider-btn2 postion-absolute" id="schedule-btn-teach" href="#"
                                               style="bottom:0px;width: 100%;position:absolute;"><?php echo app('translator')->get('teacherhome.LEARN_MORE'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="btn btn-primary leftLst">
                            <</button> <button class="btn btn-primary rightLst">>
                        </button>
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

<?php echo $__env->make('layouts.masterStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/frontend/pages/students/student-home.blade.php ENDPATH**/ ?>