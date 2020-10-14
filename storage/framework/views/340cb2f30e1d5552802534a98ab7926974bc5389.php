
<?php $__env->startSection('title','level'); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/students-subjects.css')); ?>">

    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h1 data-animation="fadeInUp" data-delay="1s">REGISTER</h1>
                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>



<section class="main-section">
    <div class="container">
        
        <div class="main-cont">
            
            <div class="row">
                <div class="col-md">
                    <h3 class="level-heading" >WHAT SUBJECTS DO YOU WANT TO STUDY?</h3>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="form-parts">                        
                        <form>

                            <label class="container-checkbox">English
                                <input type="checkbox" checked="checked">
                                <span class="checkmark"></span>
                             </label>

                             <label class="container-checkbox">Geography
                                <input type="checkbox">
                                <span class="checkmark"></span>
                             </label>

                             <label class="container-checkbox">Physics
                                <input type="checkbox">
                                <span class="checkmark"></span>
                             </label>

                             <label class="container-checkbox">Biology
                                <input type="checkbox">
                                <span class="checkmark"></span>
                             </label>

                             <label class="container-checkbox">Help Homework
                                <input type="checkbox">
                                <span class="checkmark"></span>
                             </label>

                             <label class="container-checkbox">Maths
                                <input type="checkbox">
                                <span class="checkmark"></span>
                             </label>     

                             <label class="container-checkbox">Chemistry
                                <input type="checkbox">
                                <span class="checkmark"></span>
                             </label>

                             <label class="container-checkbox">History
                                <input type="checkbox">
                                <span class="checkmark"></span>
                             </label>
                             
                    </div>                    
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="form-parts">                

                        <label class="container-checkbox">Design and Technology
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container-checkbox">Spanish
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container-checkbox">Citizenship
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container-checkbox">German
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container-checkbox">Chinese
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container-checkbox">Arabic
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container-checkbox">Latin
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>

                          <label class="container-checkbox">Other
                            <input type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                          <div class="md-form mt-0">
                            <label class="container-checkbox">Other
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                          </div>
                          <div id="items" class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Name</label>
                          <div class="col-md-4 margin-bottom">
                            <input id="textinput" name="textinput" type="text" placeholder="Enter name of referral" class="form-control input-md">
                          
                          </div>
                          </div>
                          <label class="container-checkbox">                    
                                <button type="button" class="btn btn-primary active">Register</button>
                          </label>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/views/frontend/register/students/student-subject.blade.php ENDPATH**/ ?>