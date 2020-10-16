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
        <div class="container customContainer">
            <div class="main-cont">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center customSetW">
                        <div class="form-parts">


                            <div style="display:flex;width:100%;">

                                <form  method="post" action="<?php echo e(route ('editteacherprofile')); ?>" id="form">
                                    <?php echo csrf_field(); ?>
                                    <div style="width:100%;">
                                        <h3 class="level-heading" >Edit Profile</h3>
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
                                        <input name="fname" autofocus placeholder="First Name" value="<?php echo e($getrecord[0]->fname); ?>" required="true">
                                    </div>
                                    <div style="width:100%;">
                                        <input name="lname" autofocus placeholder="Last Name" value="<?php echo e($getrecord[0]->lname); ?>" required="true">
                                    </div>
                                    <div style="width:100%;">
                                        <input type = "email" name="email" placeholder="Email Address" value="<?php echo e($getrecord[0]->email); ?>" required="true">

                                    </div>

                                    <!--  <div style="width:100%;">
                                         <input type = "file" name="img"  required="true" accept="image/x-png,image/gif,image/jpeg" >
                                     </div> -->
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required="true">
                                        <label class="form-check-label" for="invalidCheck2">
                                            By signing up, you agree to our <a href="#" id="alreasy-account">Terms and Conditions</a> and <a href="#" id="alreasy-account">Privacy Policy</a>
                                        </label>
                                    </div>
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="true">
                                        <label class="form-check-label" for="invalidCheck">
                                            Can we contact you about Learn 4 Learning?
                                        </label>
                                    </div>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary active" >SignUp</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 setImagePadEdit">
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


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/editTeacherProfile.blade.php ENDPATH**/ ?>