<?php $__env->startSection('title','Student Homework'); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/student-homework.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">


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
            <form class="search_form" action="<?php echo e(route('SearchStudentHomeworks')); ?>" method="post">
            <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col-md-3" style="padding: 18px;">
                  <select class="selectpicker" name="date_id">
                        <optgroup label="Picnic">
                        <?php
                                                         if(@$Date){
                                                        $aray1=[];
                                                        $arraytypes=[];  ?>
                                                        <?php foreach (@$Date as $key => $Date) {
                                                        if(count($aray1)==0){
                                                        array_push($aray1,$Date);
                                                        array_push($arraytypes,$Date->date);

                                                        }else{
                                                            if(!in_array($Date->date, $arraytypes)){
                                                            array_push($aray1,$Date);
                                                            array_push($arraytypes,$Date->date);
                                                            $cc=count($arraytypes);

                                                        }
                                                        }


                                                        }
                                                        ?>

                                <option value="">Find Date</option>

                                <?php $__currentLoopData = $aray1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($Date->id); ?>"><?php echo e($Date->date); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php      }       ?>
                        </optgroup>
                      </select>

                  </div>

                  <div class="col-md-3"  style="padding: 18px;">
                  <select class="selectpicker" name="subject_id">
                        <optgroup label="Picnic">
                        <?php
                                                         if(@$subjects){
                                                        $aray1=[];
                                                        $arraytypes=[];  ?>
                                                        <?php foreach (@$subjects as $key => $subjects) {
                                                        if(count($aray1)==0){
                                                        array_push($aray1,$subjects);
                                                        array_push($arraytypes,$subjects->name);

                                                        }else{
                                                            if(!in_array($subjects->name, $arraytypes)){
                                                            array_push($aray1,$subjects);
                                                            array_push($arraytypes,$subjects->name);
                                                            $cc=count($arraytypes);

                                                        }
                                                        }


                                                        }
                                                        ?>

                                <option value="">Find Subjects</option>

                                <?php $__currentLoopData = $aray1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($subjects->id); ?>"><?php echo e($subjects->name); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php      }       ?>
                        </optgroup>
                    </select>

                  </div>

                  <div class="col-md-3"  style="padding: 18px;">
                  <select class="selectpicker" name="title_id">
                        <optgroup label="Picnic">
                        <?php
                                                         if(@$Title){
                                                            $aray1=[];
                                                            $arraytypes=[];  ?>
                          <?php foreach (@$Title as $key => $Title) {
                                        if(count($aray1)==0){
                                              array_push($aray1,$Title);
                                              array_push($arraytypes,$Title->title);

                                                        }else{
                                                            if(!in_array($Title->title, $arraytypes)){
                                                            array_push($aray1,$Title);
                                                            array_push($arraytypes,$Title->title);
                                                            $cc=count($arraytypes);

                                                        }
                                                        }


                                                        }
                                                        ?>

                                <option value="">Find Title</option>

                                <?php $__currentLoopData = $aray1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($Title->id); ?>"><?php echo e($Title->title); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php      }       ?>
                      </select>
                  </div>

                  <div class="col-md-3"  style="padding: 18px;">
                  <button type="submit"  class="main-slider-btn2 btn btn-warning" value="" style="background-color: #FDBF11;color:white">SEARCH</button>
                  </div>
                </div>

            </form>
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
                      <tbody>
                        <?php $__currentLoopData = $teacherhomeworkdetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacherhomeworkdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th scope="row"><?php echo e($teacherhomeworkdetail->name); ?></th>
                          <td><?php echo e($teacherhomeworkdetail->getTitle($teacherhomeworkdetail->id)); ?></td>
                          <td><?php echo e($teacherhomeworkdetail->getDate($teacherhomeworkdetail->id)); ?></td>



                          <td>
                           <a href="<?php echo e(url('/view/{id}', [$teacherhomeworkdetail->subject_iid])); ?>">
                           <button type="button" class="btn btn-indigo btn-sm m-0" id="upload-work-btn">View HOMEWORK</button>     </a></td>



                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






                      </tbody>
                    </table>
                  </div>
            </div> <!-- row -->
            <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE ALL</a>
            </div>
        </div> <!-- container -->
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.masterStudent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/frontend/pages/students/student-homework.blade.php ENDPATH**/ ?>