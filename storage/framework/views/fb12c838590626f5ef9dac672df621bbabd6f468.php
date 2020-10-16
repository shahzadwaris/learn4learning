
<?php $__env->startSection('title','level'); ?>
<?php $__env->startSection('content'); ?>

<style>
    @media (max-width: 991px)
    {
        .customSetting{

            width: 100%;
        }
    }
</style>

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


<section class="schedules">

    <div class="container p-3">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h5 class="schedule-heading-teacher-homepage"
                    style="color: #006796;font-size: 28px;letter-spacing: 3px;">Your Scheduled Lessons</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-12 col-md-8">
                <div class="row p-0">
                    <?php $__currentLoopData = $myLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-3 border ml-2 p-0">
                        <div class="row text-center p-0">
                            <div class="card-body  p-0 pt-4">
                                <h5 class="pb-2" style="color:#006796;"><?php echo e($lesson->lesson->subject->name); ?></h5>
                                <h6 class="mb-2 text-muted" style="color:#006796;"><?php echo e($lesson->lesson->title); ?></h6>
                                <p class="card-text">
                                    <?php echo e($lesson->lesson->date->format('m/d')); ?><br /><?php echo e($lesson->lesson->time->format('H:i')); ?>

                                </p>
                                <div class="row p-0">
                                    <div class="col-12 w-100 mt-3 p-0">
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 w-100"
                                            href="#" id="donate-register-btn">View Lesson</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>
</section>




<section id="about-part" class="about-tow pt-65">
    <div class="about-shape">
    </div>
    <!-- container -->
</section>


<section class="admission-row pb-120 customSetting">
    <div class="container p-5 bg_cover gray-bg">
        <div class="row">
            <div class="col-12 text-center">
                <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 3px;">Find A Lesson</h5>

            </div>
        </div>
        <div class="row justify-content-center">
            <form action="<?php echo e(route('subjects.search')); ?>">

                <div class="row">
                    <div class="col-md-3" style="padding: 18px;">
                        <select name="subject" class="selectpicker">
                            <optgroup label="Picnic">
                                <option>Subject</option>
                                <?php $__currentLoopData = $allSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        </select>

                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <select name="level" class="selectpicker">
                            <optgroup label="Picnic">
                                <option value="">Level</option>
                                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($level->id); ?>"><?php echo e($level->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        </select>

                    </div>

                    <div class="col-md-3 w-100" style="padding: 18px;">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control p-4" value="<?php echo e(old('date')); ?>" name="date" id="date">
                        </div>
                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <input type="submit" value="Search" data-animation="fadeInUp" data-delay="2s"
                            class="main-slider-btn2" style="background-color: #FDBF11; border: none;" />
                    </div>
                </div>

            </form>
        </div> <!-- row -->
    </div> <!-- container -->
</section>








<section class="admission-row pb-120" id="filter-search-form">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-10 ">
                <h5 style="color: #006796;font-size: 28px;letter-spacing: 3px;">Filter By</h5>

            </div>
        </div>
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

                    <div class="col-md-3" style="padding: 18px;">
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

                    <div class="col-md-3" style="padding: 18px;">
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

                    <div class="col-md-3" style="padding: 18px;">
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#"
                            style="background-color: #006796;">FILTER</a>
                    </div>
                </div>

            </form>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<section id="course-part" style="background-image: url(images/course/course-shape.png)">
    <section id="course-part" style="background-image: url(images/course/course-shape.png)">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                
                                <img src="<?php echo e(asset('storage/images/'.$lesson->thumbnail)); ?>" class="thumbnail-image"
                                    alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img width="150px"
                                            src="<?php echo e(asset('storage/images/'.$lesson->teacher->thumbnail)); ?>"
                                            alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#">
                                            <h6><?php echo e($lesson->teacher->fname .' '. $lesson->teacher->lname); ?></h6>
                                        </a>
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
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn"
                                href="<?php echo e(route('addToCalender', $lesson->id)); ?>"
                                style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO
                                CALENDAR</a>
                        </div>
                    </div> <!-- single course -->
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 mb-4 justify-content-center text-center mt-3" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="disable main-slider-btn2" href="#"
                        id="donate-register-btn">VIEW MORE</a>
                </div>
            </div> <!-- course slide -->
        </div> <!-- container -->
    </section>



    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('css'); ?>
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/student-schedule.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">


    <style type="text/css">
        .schedules .card {
            height: auto;
        }

        .theme-color-bg {
            background-color: #036893;
        }

        .theme-color {
            color: #036893 !important;
        }

        .spacing-top {
            margin-top: 20px;
        }

        .card-img-top {
            height: 111px;
            width: 144px;
        }

        .card a h4 {
            padding-top: 25px;
        }

        .thumbnail-image {
            max-height: 350px;
            max-width: 200px;
        }

        .disable {
            pointer-events: none;
            cursor: default;
        }
    </style>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.masterStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/frontend/pages/students/student-schedule.blade.php ENDPATH**/ ?>