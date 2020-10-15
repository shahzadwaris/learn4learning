
<?php $__env->startSection('title','level'); ?>
<?php $__env->startSection('content'); ?>



<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/students-level.css')); ?>">

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">REGISTER</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
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
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="form-parts">
                        <h3 class="level-heading">What level are you?</h3>
                        <form action="<?php echo e(route('selectSubjects')); ?>" method="get">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">
                            <select name="level" class="selectpicker">
                                <?php $__currentLoopData = $level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lvl->name); ?>"><?php echo e($lvl->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select><br>
                            <div class="submit-button">
                                <button type="submit" class="btn btn-primary active" style="">Next</button>
                            </div>
                        </form>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/auth/students/student-level.blade.php ENDPATH**/ ?>