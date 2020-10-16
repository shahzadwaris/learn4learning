
<?php $__env->startSection('title','SignIn'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .gray_font {
        color: #737171 !important;
        letter-spacing: 2px;
    }

    .text_gray {
        color: #737171 !important;
    }
    #submit-btn{
        justify-content: flex-end;
    }
    .customContainer{
        width:85%;
    }
    ._inputwidth{
        width: 100% !important;
    }
    .customForm{
        width: 100%;
    }


    @media (max-width: 991px) {
        #submit-btn {
            justify-content: flex-end;
            display: none !important;
        }
    }
    @media (max-width: 575px) {
        .main-cont .row {
            margin-right: 0px !important;
            box-shadow: 0px 0px 0px -3px black !important;
            background: white;
            margin-top: 0px !important;
            position: relative;
            margin-left: auto;
        }
        .customContainer{
            width:100%;
            padding-left: 0px !important;
            padding-right: 0px !important
        }
        .customForm{
            width: 100%;
                padding-left: 5px;
                 padding-right: 5px;
        }
    }
</style>
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/login2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">LOGIN</h1>
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
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
                <div class="col-lg-6 d-flex pt-4 justify-content-center" style="display: flex; align-items: center;">
                    <div class="form-parts">
                        <div style="display:flex;width:100%;">
                            <form class="form customForm" method="post" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div style="width:100%;">
                                    <h3 class="level-heading">Login</h3>
                                </div>

                                <?php if(session()->has('message.level')): ?>

                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?php echo session('message.content'); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>

                                <div style="width:100%;">
                                    <input type="email" class="_inputwidth" name="email" placeholder="Email Address"
                                        required="true">
                                </div>
                                <div style="width:100%;">
                                    <input type="password" class="_inputwidth" name="password"
                                        placeholder="Write your Password" required="true">
                                </div>
                                <div style="width:100%;">
                                    <input class="form-check-input" type="checkbox" name="remember_me" value=""
                                        id="invalidCheck">
                                    <label class="form-check-label" for="invalidCheck">
                                        Remember me
                                    </label>
                                    <a href="<?php echo e(route('password.request')); ?>" class="form-check-label ml-5">Forgot
                                        Password?</a>
                                </div>
                                
                                <button type="submit" class="btn btn-primary active">LOGIN</button>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 p-0">
                    <div class="d-flex" id="submit-btn">
                        <img class="img-responsive"
                            src="<?php echo e(asset('asset/images/students/registration-banner_50.png')); ?>" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/auth/login.blade.php ENDPATH**/ ?>