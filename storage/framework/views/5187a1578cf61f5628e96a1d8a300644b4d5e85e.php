<?php $__env->startSection('title','Student Homework'); ?>
<?php $__env->startSection('content'); ?>
<style>
    @media( max-width: 377px)
    {
        #std-homework-table-sec{
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

<section id="about-part" class="about-tow pt-65">
    <div class="about-shape">
    </div>
    <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 5px;">Find A Lesson</h5>
    <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== ADMISSION PART START ======-->

<section class="admission-row pb-120" id="std-homework-find-lesson-sec">
    <div class="container">
        <div class="row justify-content-center">
            <form class="search_form" action="<?php echo e(route('SearchHomeworks')); ?>" method="get">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="subject_id">
                            <optgroup label="Picnic">
                                <option value="">Find Subjects</option>

                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        </select>

                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="title_id">
                            <optgroup label="Picnic">
                                <option value="">Find Subjects</option>

                                <?php $__currentLoopData = $Title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($Title->title); ?>"><?php echo e($Title->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="date_id">
                            <optgroup label="Picnic">

                                <option value="">Find Subjects</option>

                                <?php $__currentLoopData = $Date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($Date->date); ?>"><?php echo e($Date->date); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        </select>

                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <button type="submit" class="main-slider-btn2 btn btn-warning" value=""
                            style="background-color: #FDBF11;color:white;padding:0 23px;">SEARCH</button>
                    </div>
                </div>

            </form>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<section class="admission-row pb-120" id="std-homework-table-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive table-home-assign">
                <table class="table-responsive">
                    <thead>
                        <tr>
                            <th scope="col" class="table-heading">SUBJECT</th>
                            <th scope="col" class="table-heading">TITLE</th>
                            <th scope="col" class="table-heading">DATE</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $Lessonss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <th scope="row"><?php echo e($lesson->sub_name); ?></th>
                            <td><?php echo e($lesson->title); ?></td>
                            <td><?php echo e($lesson->date); ?></td>

                            <td colspan="3">
                                <a
                                    href="<?php echo e(route('addsubjecthomework', ['lesson' => $lesson->id,'subject' => $lesson->sub_id])); ?>"><button
                                        type="button" class="btn btn-indigo ml-2 btn-sm m-0" id="upload-work-btn">UPLOAD
                                        HOMEWORK</button></a>

                                <a
                                    href="<?php echo e(route('addsubjecthomework', ['lesson' => $lesson->id,'subject' => $lesson->sub_id])); ?>"><button
                                        type="button" class="btn btn-indigo ml-2 btn-sm m-0"
                                        style="background-color: #ffc10e !important;" id="upload-work-btn">DOWNLOAD
                                        HOMEWORK</button></a>
                                <a
                                    href="<?php echo e(route('addsubjecthomework', ['lesson' => $lesson->id,'subject' => $lesson->sub_id])); ?>"><button
                                        type="button" class="btn btn-indigo  btn-default ml-2 btn-sm m-0"
                                        id="upload-work-btn">
                                        Grade</button></a>
                            </td>
                            <!-- <td><button type="button" class="btn btn-indigo btn-sm m-0" id="ask-question-btn">ASK QUESTION</button></td>
                          <td><button type="button" class="btn btn-indigo btn-sm m-0" id="view-lesson-btn">VIEW LESSON</button></td>                                                   -->
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/teacher-homework-assign.css')); ?>">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">

<style>
    .nice-select.selectpicker {
        width: 100% !important;
    }

    .single-slider.slider-4.bg_cover.pt-150.slick-slide.slick-current.slick-active {
        background-position: unset !important;
    }

    .single-slider {
        padding-bottom: 110px !important;
    }

    ._profile_image {
        display: inline-block;
        border: 2px solid gray;
        height: 80px;
        width: 80px;
        border-radius: 50%;
        position: absolute;
        z-index: 999;
        background: white;
    }

    @media (max-width: 1440px) {
        .ccontainer {
            max-width: 1074px;
            padding-left: 0px !important;
        }
    }

    @media (max-width: 1440px) {
        .cfiltercontainer {
            max-width: 1250px;
            padding-left: 0px !important;
        }
    }

    @media (max-width: 767.98px) and (min-width: 576px) {
        .about-tow {
            padding: 45px 0px 15px 0px !important;
        }
    }

    @media  only screen and (max-width: 575.98px) {
        .admission-row {
            padding-bottom: 14px;
            width: 100%;
            margin: 0 auto;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/frontend/pages/teachers/teacher-homeWork.blade.php ENDPATH**/ ?>