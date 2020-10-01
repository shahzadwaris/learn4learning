
<?php $__env->startSection('title','level'); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/student-schedule.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">


    <style type="text/css">
    .schedules .card{
        height: auto;
    }
    .spacing-top{
        margin-top: 20px;
    }

    .card-img-top {
    height: 111px;
    width: 144px;
}

.card a h4 {
    padding-top: 25px;
}


</style>
    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/student-lesson-search/banner.jpg')); ?>">
            <div class="container" >
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


<section class="schedules">

        <div class="container">

                      <h5 class="schedule-heading-teacher-homepage" >My Schedule</h5>
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
                                  <h4><?php echo e($Book0[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book1[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book3[0]->date); ?></h4>
                            </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book03[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book03; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book04[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book004; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book05[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book005; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book06[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book06; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book07[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book007; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
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
                                  <h4 class="card-title"><?php echo e($Book08[0]->date); ?></h4>
                        </a>
                        <!-- Card content -->
                        <div class="card-body">
                        <!-- Title -->
                     <?php $__currentLoopData = $Book008; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookingg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="teach-shed-card-content"> <?php echo e($bookingg->time); ?>&nbsp;&nbsp;&nbsp;<?php echo e($bookingg->sub_name); ?></p>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <br>
                    

                          
                        </div>
                        <!-- Card footer -->

                    </div>
                </div>
            <?php } ?>
  



              
            </div>

  <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div" style="margin-top: 10px">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE ALL</a>
                </div>
          
        </div>
    </section>




    <section id="about-part" class="about-tow pt-65">
        <div class="about-shape">
        </div>
        <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 5px;">Find A Lesson</h5>
         <!-- container -->
    </section>


    <section class="admission-row pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <form>

                    <div class="row">
                      <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Secondary Level</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                        </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Mathematics</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Date</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" style="background-color: #FDBF11;">SEARCH</a>
                      </div>
                    </div>

                </form>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    



    


    <section id="filter-search-head" class="about-tow pt-65">
        <div class="about-shape">
        </div>
        <div class="container">
            <h5 style="text-align: left;color: #006796;font-size: 28px;letter-spacing: 5px;">Filter By</h5>
        </div>

         <!-- container -->
    </section>


    <section class="admission-row pb-120" id="filter-search-form" >
        <div class="container">
            <div class="row justify-content-center">
                <form>

                    <div class="row">
                      <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Secondary Level</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                        </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Mathematics</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Date</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" style="background-color: #FDBF11;">FILTER</a>
                      </div>
                    </div>

                </form>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(images/course/course-shape.png)"> <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(images/course/course-shape.png)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="level-heading-courses">SIMILAR LESSONS</h3>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-1.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-1.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-2.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-2.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-3.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-3.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-4.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-4.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-5.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-5.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-2.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-2.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-2.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-2.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-2.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-2.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="<?php echo e(asset('asset/images/course/cu-2.jpg')); ?>" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="<?php echo e(asset('asset/images/course/teacher/t-2.jpg')); ?>" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
                                    <div class="review">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">VIEW MORE</a>
                </div>
            </div> <!-- course slide -->
        </div> <!-- container -->
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masterStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\learnforlearning\resources\views/frontend/pages/students/student-schedule.blade.php ENDPATH**/ ?>