
<?php $__env->startSection('title','Schedules'); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/student-schedule.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">

    <style>
        .nice-select.selectpicker{
            width: 100%!important;
        }
        .single-slider.slider-4.bg_cover.pt-150.slick-slide.slick-current.slick-active{
            background-position:unset!important;
        }
        .single-slider {
            padding-bottom: 110px!important;
        }
        ._profile_image{
            display: inline-block;
            border: 2px solid gray;
            height: 80px;
            width: 80px;
            border-radius: 50%;
            position: absolute;
            z-index: 999;
            background: white;
        }
        @media (max-width: 1440px){
            .ccontainer {
                max-width: 1074px;
                padding-left: 0px!important;
            }
        }
        @media (max-width: 1440px){
            .cfiltercontainer {
                max-width: 1250px;
                padding-left: 0px!important;
            }
        }
        
        @media (max-width: 767.98px) and (min-width: 576px){
            .about-tow {
                padding: 45px 0px 15px 0px !important;
            }
        }

        @media  only screen and (max-width: 575.98px){
            .admission-row {
                padding-bottom: 14px;
                 width: 100%; 
                margin: 0 auto;
            }
        }
        
    </style>
    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/student-lesson-search/banner.jpg')); ?>">
            <div class="container">
                <h2 class="text-white text-center">MY SCHEDULE</h2>
                <div class="d-flex justify-content-center mt-4">
                    <a href="<?php echo e(url('teacher-add-lesson')); ?>" class="main-slider-btn2 btn btn-warning" value="" style="background-color: #FDBF11;color:white;padding:0 23px;">ADD LESSON</a>
                </div>
                
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
<!-- Card -->
    <section id="about-part" class="about-tow pt-65 bg-white">
        <div class="about-shape">
        </div>
        <div class="container cfiltercontainer">
            <h6 style="color: #006796;font-size: 18px;letter-spacing: 2px;padding:0 18px;">Filter By</h5>
        </div>
         <!-- container -->
    </section>


    <section class="admission-row pb-120 bg-white">
        <div class="container cfiltercontainer">
            <div class="row justify-content-center">
                <form action="<?php echo e(route('SearchSchedule')); ?>" method="get">
                <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col-md-3" style="padding: 18px;">
                      <select class="selectpicker" name="level_id" required="true">
                                <optgroup label="Picnic"> 
                                   <option value=""><?php echo app('translator')->get('welcome.Find_A_Course'); ?></option>
                                   <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                </optgroup>
                            </select>
                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                      <select class="selectpicker" name="subject_id" required="true" >
                                <optgroup label="Picnic">
                                    <option value="">Find Subjects</option>
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($subjects->id); ?>"><?php echo e($subjects->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                            </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                      <select class="selectpicker" name="date_id" required="true" >
                                <optgroup label="Picnic">
                                    <option value="">Find Date</option>
                                    <?php $__currentLoopData = $Date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($Date->date); ?>"><?php echo e($Date->date); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            </select>

                      </div>

                      <div class="col-md-3"  style="padding:18px;">
                      <button type="submit"  class="main-slider-btn2 btn btn-warning" value="" style="background-color: #FDBF11;color:white;padding:0 23px;">SEARCH</button>
                      </div>
                    </div>

                </form>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    



    
   <section id="course-part" class="pt-115 pb-115 bg_cover" style="background-image: url(images/course/course-shape.png)">
        <div class="container ccontainer">
            
            <div class="row">
                <?php $__currentLoopData = $Book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-12 position-relatiove justify-content-center d-flex">
                            <div class="_profile_image" style="<?php echo e(!empty(auth::user()->thumbnail) ? 'background-image: url(http://127.0.0.1:8000/storage/images/'.auth::user()->thumbnail.');background-size: cover;' : ''); ?>">
                                
                                
                            </div>
                            <div class="single-course-2 mt-30">
                                <div class="thum">
                                    <div class="price">
                                        <span></span>
                                    </div>
                                    <div class="card">
                                        <img src="<?php echo e(url('/storage/images/'.$leson->thumbnail)); ?>">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <h4 class="card-title text-white"><?php echo e($leson->sub_name); ?></h4>
                                            <a href="<?php echo e(route('studentLesson',[$leson->id])); ?>">
                                            <h6 class="card-subtitle mb-2"><?php echo e($leson->title); ?></h6>
                                            </a>
                                            <hr>
                                            <div class="link d-flex">
                                            </div>
                                            <div class="row" id="rating-date-lesson">
                                                <div class="col-6"><h4 class="card-title text-white"><?php echo e($leson->Lesson_date); ?><br>
                                                        <?php echo e($leson->Lesson_time); ?></h4>
                                                </div>
                                                <div class="col-6">
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
                                    </div>
                                </div>
  <div class="cont">

                              
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="<?php echo e(route('EditLesson', [$leson->lessonsid])); ?>" style="background: gray;color: white;font-weight: 500;display: block;"><i class="fas fa-edit fa-2x text-white"></i> EDIT LESSON</a>

                                </div>                            </div> <!-- single course -->
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> <!-- course slide -->
        </div> <!-- container -->
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bladocou/learning.rkixtech.com/resources/views/frontend/pages/teachers/teacher-schedule.blade.php ENDPATH**/ ?>