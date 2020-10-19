<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','level'); ?>
<?php $__env->startSection('content'); ?>

<style>
    #img_url {
        background: #ddd;
        width: 50px;
        height: 50px;
        display: block;
    }


    input[type=file] {
        padding: 10px;
        background: #2d2d2d;
    }

    .gray_font {
        color: #737171 !important;
        letter-spacing: 2px;
    }

    .text_gray {
        color: #737171 !important;
    }

    ._skip_btn {
        background-color: #ff000000 !important;
        color: gray;
        box-shadow: unset;
        text-decoration: underline;
    }
</style>

<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/teachers-profile.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">Thanks for registering!</h1>
                        
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
                <div class="col-lg-6 d-flex align-items-center justify-content-center p-5">
                    <div class="form-parts">
                        <h3 class="level-heading">Let's Build your Profile</h3>
                        <div style="display:flex;width:100%;">
                            <form action="<?php echo e(url('/get-profile')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div style="padding-right: 50px">
                                    <p class="gray_font">Profile Picture</p>
                                </div>

                                <div class="file-field">

                                    <div class="btn btn-unique btn-sm float-left"
                                        style="background-color: #fff!important; width: 100px;height: 100px; padding: 5px;border-radius: 100px;">
                                        <input type="file" name="thumbnail" onchange="readURL(this);" required="true"
                                            accept="image/x-png,image/gif,image/jpeg">
                                        <div id="blah"></div>
                                    </div>

                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text"
                                            placeholder="Upload one or more files">
                                    </div>
                                </div>

                                <div style="width:100%;">
                                    <input class="_inputwidth" name="description" autofocus required="true"
                                        placeholder="Description">
                                </div>
                                
                                <div style="width:100%;">
                                    <select class="mdb-select _inputwidth" name="country" searchable="Search here.."
                                        required="true">
                                        <option value="" disabled selected>Country</option>
                                        <option value="USA">USA</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Japan">Japan</option>
                                    </select>
                                </div>
                                <div class="w-100">
                                    <select class="form-control tags" name="favorite_subject[]" multiple="multiple"
                                        style="width: 100%">
                                        <?php $__currentLoopData = $allSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subjects->name); ?>"><?php echo e($subjects->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="w-100">
                                    <select class="form-control tags" name="subjects[]" multiple="multiple"
                                        style="width: 100%">
                                        <?php $__currentLoopData = $allSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subjects->name); ?>"><?php echo e($subjects->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                <div class="d-flex" style="width: 100%">
                                    <p class="gray_font">Open 1:1 Tuition </p>
                                    <div class="custom-control custom-radio ml-3">
                                        <input type="radio" class="custom-control-input" value="1" id="defaultUnchecked"
                                            name="fof_session">
                                        <label class="custom-control-label gray_font" for="defaultUnchecked">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio ml-2">
                                        <input type="radio" class="custom-control-input" value="0" id="defaultChecked"
                                            name="fof_session" checked="">
                                        <label class="custom-control-label gray_font" for="defaultChecked">No</label>
                                    </div>
                                </div>
                                

                                <button type="submit" class="btn btn-primary active"
                                    style="box-shadow: unset;">SAVE</button>
                                <button type="button" class="btn btn-primary active _skip_btn"
                                    style=" background-color: #ff000000!important;box-shadow: unset;">
                                    <a href="<?php echo e(route('skip')); ?>"
                                        style="color: gray;text-decoration: underline;"><b>SKIP</b></a></button>

                                <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 p-0">
                    <div class="d-flex align-items-center justify-content-center" id="submit-btn">
                        <img src="<?php echo e(asset('asset/images/students/registration-banner.png')); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').html('<img id="blah" src="'+e.target.result+'" style="object-fit:cover;height:100px;width: 100px;border-radius: 100px;" alt="your image" />')
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".tags").select2({
        tags: true,
        width: 'resolve',
        placeholder: "Select Favourite Subject",
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/auth/students/student-profile.blade.php ENDPATH**/ ?>