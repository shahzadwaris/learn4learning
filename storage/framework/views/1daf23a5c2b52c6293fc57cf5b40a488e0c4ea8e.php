
<?php $__env->startSection('title','Student Homepage'); ?>
<?php $__env->startSection('content'); ?>

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
</style>
<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/student-lesson-search/banner.jpg')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h3 class="std-welcome-msg text-white"><?php echo $Auth=Auth::User()->fname; ?><br>

                            Welcome back!</h3>
                        <div class="row">
                            
                            <div class="col-7 ml-5 pl-5">
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
 $auth=Auth::User()->id;
                          $usersimgg=DB::table('users')->where('users.id', $auth)->select('users.*')->get();
 ?>
                        
                        <img src="<?php echo e(url('/storage/images/'. (!empty($usersimgg[0]->thumbnail) ? $usersimgg[0]->thumbnail : 'default.png') )); ?>"
                            alt="stud-profile-pic">
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <p class="stud-name">Hi-<?php echo e(Auth::user()->fname); ?></p>
                        <p class="stud-date">23/01/2012</p><br><br>
                        <a href="#" class="stu-fav-subj-link w-100 text-left" style="">My Favourite
                            Subjects</a>
                        <p class="stu-fav-subj-list w-100 text-left">Maths, Geography, English</p>
                        <p class="points-para w-100 text-left">5000 points</p>
                    </div>
                </div>
            </div>
            <div class="col-6" id="std-dashboard-right">
                <div class="row">
                    <div class="col-6 p-3" id="achieve-div">
                        <img src="<?php echo e(asset('asset/images/student-homepage/achievement.png')); ?>" alt="">
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
                        <img src="<?php echo e(asset('asset/images/student-homepage/grades.png')); ?>" alt="">
                        <p>MY<br>GRADES</p>
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

            <!--Controls-->

            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <?php $__currentLoopData = $MyAchivment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $MyAchivment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <!--First slide-->




                <div class="carousel-item active">
                    <div class="col-md-2">
                        <img class="card-img-top" src="<?php echo e(url('/storage/images/'.$MyAchivment->img)); ?>"
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
        <?php 
             foreach($Book as $Booking) {
                 $lessin_index[]=$Booking->student_lessons_id;

             }

     ?>



        <div class="row">
            <?php 
                if(isset($lessin_index[0])){
    $auth=Auth::User()->id;
               $Book0=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[0])

                        ->get();

$dateid=$Book0[0]->date;


           $Book1=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[0] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book0[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>



            <?php 
                if(isset($lessin_index[1])){
    $auth=Auth::User()->id;
               $Book1=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[1])

                        ->get();

$dateid=$Book1[0]->date;


           $Book2=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[1] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book1[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>






            <?php 
                if(isset($lessin_index[2])){
    $auth=Auth::User()->id;
               $Book3=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[2])

                        ->get();

$dateid=$Book3[0]->date;


           $Book4=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[2] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book3[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>





        </div>



        <div class="row spacing-top">
            <?php 
                if(isset($lessin_index[3])){
    $auth=Auth::User()->id;
               $Book03=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[3])

                        ->get();

$dateid=$Book03[0]->date;


           $Book03=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[3] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book03[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book03; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>



            <?php 
                if(isset($lessin_index[4])){
    $auth=Auth::User()->id;
               $Book04=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[4])

                        ->get();

$dateid=$Book04[0]->date;


           $Book004=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[4] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book04[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book004; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>






            <?php 
                if(isset($lessin_index[5])){
    $auth=Auth::User()->id;
               $Book05=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[5])

                        ->get();

$dateid=$Book3[0]->date;


           $Book005=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[5] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book05[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book005; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>





        </div>





        <div class="row spacing-top">
            <?php 
                if(isset($lessin_index[6])){
    $auth=Auth::User()->id;
               $Book06=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[6])

                        ->get();

$dateid=$Book06[0]->date;


           $Book06=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[6] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book06[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book06; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>



            <?php 
                if(isset($lessin_index[7])){
    $auth=Auth::User()->id;
               $Book07=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[7])

                        ->get();

$dateid=$Book07[0]->date;


           $Book007=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[7] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book07[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book007; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>






            <?php 
                if(isset($lessin_index[8])){
    $auth=Auth::User()->id;
               $Book08=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.date')
                        ->where('student_lessons.user_id', $auth)
                        ->where('student_lessons.id',$lessin_index[8])

                        ->get();

$dateid=$Book3[8]->date;


           $Book008=DB::table('lessons')
                         ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select( 'lessons.*' , 'subjects.name as sub_name' , 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $auth)
                        ->where('lessons.date', $dateid)
                        ->where('student_lessons.id',$lessin_index[8] )

                        ->get();


?>
            <div class="col-4">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <a href="#">
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <h4 class="card-title"><?php echo e($Book08[0]->date); ?></h4>
                        </div>
                    </a>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <?php $__currentLoopData = $Book008; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?>

                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>



                    </div>
                    <!-- Card footer -->

                </div>
            </div>
            <?php } ?>





        </div>

        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div" style="margin-top: 10px">
            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE
                ALL</a>
        </div>

    </div>
</section>


<!-- <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(images/c)"> <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(<?php echo e(asset('asset/images/teacher-homepage/grades-carousel-bgimg.png')); ?>">
            <div class="container">   
                <div class="teacher-grade-dash-head-div">
                    <p class="teacher-grade-dash-head">MY GRADES</p>
                    <hr>
                </div>     
                <div class="row">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner">
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                     </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                    
                                     </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                  
                                       </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                   
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 item">
                                <div class="pad15">
                                    <div class="card box-shadow">
                                        <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" id="grade-btn-teach">REPORT CARD MARCH</p>
                                        <p class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>                             
                                        <p  class="grades-details">Geography <span>A'</span></p>
                                        <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details" href="#" id="donate-register-btn">SEE ALL</a>
                                        </div>                                   
                                      </div>
                                </div>
                            </div>
                            
                        </div>
                        <button class="btn btn-primary leftLst"><</button>
                        <button class="btn btn-primary rightLst">></button>
                    </div>
                </div>
            </div>           
        </section> -->











<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\learnforlearning\resources\views/frontend/pages/students/student-home.blade.php ENDPATH**/ ?>