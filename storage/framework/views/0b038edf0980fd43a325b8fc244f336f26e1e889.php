
<?php $__env->startSection('title','SignUp'); ?>
<?php $__env->startSection('content'); ?>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/register2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">

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
        <div class="container" style="width:85%">
            <div class="main-cont">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center p-0">
                        <div class="form-parts">

                            <div style="display:flex;width:100%;">

                                <form  method="post" action="<?php echo e(url('signup')); ?>" id="form" class="_regForm">
                                    <?php echo csrf_field(); ?>
                                    <div style="width:100%;" class="m-0">
                                        <h3 class="level-heading pb-2" >GETTING STARTED</h3>
                                    </div>
                                    <div style="width:100%;">

                                        <a href="#" id="alreasy-account" style="color:#212529">Already have an account?</a>

                                    </div>
                                    <div >
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="student"  id="defaultUnchecked" name="type">
                                            <label class="custom-control-label gray_font" for="defaultUnchecked">I am a Student / Parent</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="teacher" id="defaultChecked" name="type" checked>
                                            <label class="custom-control-label gray_font" for="defaultChecked">I am a Teacher</label>
                                        </div>
                                    </div>
                                     <?php if(count($errors)): ?>
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
                                    <div style="width:100%;">
                                        <input name="fname" autofocus placeholder="First Name" required="true">
                                    </div>
                                    <div style="width:100%;">
                                        <input name="lname" autofocus placeholder="Last Name" required="true">
                                    </div>
                                    <div style="width:100%;">
                                        <input type = "email" name="email" placeholder="Email Address" required="true">
                                        <?php if($errors->has('email')): ?> 
                                            <div class="text-danger"><?php echo e($errors->first('email')); ?></div>

                                        <?php endif; ?>
                                    </div>

                                    <div style="width:100%;">
                                        <input type = "password" name="password" placeholder="Choose a Password" required="true" >
                                    </div>
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required="true">
                                        <label class="form-check-label text_gray" for="invalidCheck2" style="height: unset!important;width: 75%;">
                                            By signing up, you agree to our <a href="#" id="alreasy-account" class="text_gray">Terms and Conditions</a> and <a href="#" id="alreasy-account" class="text_gray">Privacy Policy</a>
                                        </label>
                                    </div>
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="true" style="height: unset!important;width: 75%;">
                                        <label class="form-check-label text_gray" for="invalidCheck" style="height: unset!important;width: 75%;">
                                            Can we contact you about Learn 4 Learning?
                                        </label>
                                    </div>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary active" >SignUp</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 p-0">
                        <div class="d-flex align-items-center justify-content-center" id="submit-btn">
                            <img src="<?php echo e(asset('asset/images/students/registration-banner.png')); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $("#submit").on("click", function(){
                var radioSelected = $("input[name=op1]").val();
                if(radioSelected == "1"){
                    alert('op1')
                }else if(radioSelected == "2"){
                    alert('op2')
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

    <script>
        $(document).ready(function(){
        $("#submit").on("click", function(){
            var radioSelected = $("input[name=op1]").val();
            if(radioSelected == "1"){
               alert('op1')
            }else if(radioSelected == "2"){
                alert('op2')
            }
        });
        });
    </script>
<?php $__env->stopSection(); ?>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

      
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bladocou/learning.rkixtech.com/resources/views/auth/register.blade.php ENDPATH**/ ?>