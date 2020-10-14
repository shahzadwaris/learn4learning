
<?php $__env->startSection('title','Student Homework'); ?>
<?php $__env->startSection('content'); ?>

<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/student-homework.css')); ?>">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">


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

    </div> <!-- row -->
  </div> <!-- container -->
</section>


<section class="admission-row pb-120" id="std-homework-table-sec">
  <div class="container">
    <div class="row justify-content-center">
      <div class="table-responsive">
        <table class="table">

          <thead>
            <tr>
              <th scope="col" class="table-heading">SUBJECT</th>
              <th scope="col" class="table-heading">TITLE</th>
              <th scope="col" class="table-heading">DUE DATE</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <?php $__currentLoopData = $Lessonss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Lessens1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo e($Lessens1->sub_name); ?></th>
              <td><?php echo e($Lessens1->title); ?></td>
              <td><?php echo e($Lessens1->date); ?></td>

              <td>
                <a href="<?php echo e(route('AssignStudentAchevemnt')); ?> ">
                  <button type="button" class="btn btn-indigo btn-sm m-0" id="view-lesson-btn">SEE HOMEWORk</button>

                </a>
              </td>
            </tr>
          </tbody>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div> <!-- row -->
    <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
      <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE
        ALL</a>
    </div>
  </div> <!-- container -->
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/teachers/ViewteacherAchevments.blade.php ENDPATH**/ ?>