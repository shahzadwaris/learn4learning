
<?php $__env->startSection('title','Add Lesson'); ?>
<?php $__env->startSection('content'); ?>

<h3 class="add-lesson-heading mt-5 mb-4">ADD A LESSON</h3>
<form action="<?php echo e(route('createLesson')); ?> " method="post" enctype="multipart/form-data">
    <section id="add-lesson-sec">
        <div class="container">
        </div>
        <div class="container Ccontainer">
            <?php if(session('message')): ?>
            <p class="alert alert-success text-dark"><?php echo e(session('message')); ?></p>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6 col-xs-12" id="add-lesson-left">
                    <div class="form-parts">
                        <p class="level-heading gray_font">Choose Lesson Category</p>
                        <select class="selectpicker" name="subject" required="true">
                            <option value="">Select any Subject </option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->subject->id .' '. $subject->level->id); ?>">
                                <?php echo e($subject->subject->name .' ('. $subject->level->name.')'); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 pl-sm-4 align-items-end d-flex">
                    <p class="gray_font" style="font-size: 12px">
                        Can’t find the subject on the list? <br>Submit one <a href="#" id="add-lesson-para"
                            style="color: gray;">here</a>.
                    </p>
                </div>
            </div>


        </div>
    </section>
    <?php echo csrf_field(); ?>

    <section id="add-level-data">
        <div class="container Ccontainer">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" value="<?php echo e(old('title')); ?>" name="title" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="" required="true">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="8"
                    required="true"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="lessonType" id="inlineRadio2" value="individual"
                    checked>
                <label class="form-check-label" for="inlineRadio2">Individual Lesson</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="lessonType" id="inlineRadio1" value="series">
                <label class="form-check-label" for="inlineRadio1">Series Class</label>
            </div>
            <?php $__errorArgs = ['lessonType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


            <div class="row my-5">
                <div class="col-sm-4 gray_font">Date</div>
                <div class="col-sm-8 gray_font">Time</div>
                <div class="col-sm-4 gray_font">
                    <div class="input-group mb-3">
                        <i class="far fa-calendar-alt fa-2x"
                            style="font-size: 37px;padding-right: 20px;color: #045375;"></i>
                        <input type="date" class="form-control" value="<?php echo e(old('registration_date')); ?>"
                            name="registration_date" id="registration-date" required="" style="max-width: 170px">
                        <div class="input-group-append">
                            <span class="input-group-text" style="background-color: #045375;color: #fff"><i
                                    class="fas fa-chevron-down"></i></span>
                        </div>
                        <?php $__errorArgs = ['registration_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="col-sm-8 gray_font">
                    <div class="input-group mb-3">
                        <i class="far fa-clock fa-2x" style="font-size: 37px;padding-right: 20px;color: #045375;"></i>
                        <input type="time" class="form-control" name="registration_time" id="registration-time"
                            required="" value="<?php echo e(old('registration_time')); ?>" style="max-width: 170px">
                        <div class="input-group-append">
                            <span class="input-group-text" style="background-color: #045375;color: #fff"><i
                                    class="fas fa-chevron-down"></i></span>
                        </div>
                        <?php $__errorArgs = ['registration_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>


            <div id="registerdate" class="my-5">
                <div class="form-check form-check-inline">
                    Repeat Daily&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="frequency" value="daily" class="form-check-input" id="materialInline1">
                    <label class="form-check-label" for="materialInline1"></label>
                </div>


                <div class="form-check form-check-inline">
                    Weekly&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="form-check-input" name="frequency" value="weekly"
                        id="materialInline2">
                    <label class="form-check-label" for="materialInline2"></label>
                </div>


                <div class="form-check form-check-inline">
                    Fortnightly&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="form-check-input" name="frequency" value="Fortnightly"
                        id="materialInline3">
                    <label class="form-check-label" for="materialInline3"></label>
                </div>


                <div class="form-check form-check-inline">
                    Monthly&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" class="form-check-input" name="frequency" value="monthly"
                        id="materialInline4">
                    <label class="form-check-label" for="materialInline4"></label>
                </div>
            </div>
            


            <div class="add-documents-heading-div">
                <p class="add-documents-heading-heading">Add Document(s)</p>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="content align-items-center d-flex">
                                <!-- <img src="" id="img_url" alt="your image"><br> -->

                                
                                <div class="text-center">
                                    <p class="addfiles-add-lesson">ADD PDF</p>
                                    <p class="addfiles-add-lesson">
                                        <span id="_pdf_name" class="gray_font"></span>
                                    </p>
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <a><i class="fas fa-plus fa-2x"></i></a>
                                        </label>
                                        <input name="document" id="file-input" type="file" onchange="readURLs(this);"
                                            accept="application/pdf,application/vnd.ms-excel" />
                                    </div>
                                </div>
                                <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="content">
                                <div>
                                    <p class="addfiles-add-lesson">ADD VIDEO (LINK)</p>
                                    <div class=" d-flex justify-content-center">
                                        
                                        <input type="textarea" name="video" class="form-control"
                                            placeholder="https://www.example.com/">
                                    </div>
                                    </p>
                                </div>

                            </div>
                            <?php $__errorArgs = ['video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="col-12 d-flex justify-content-center" id="_img_prev" style="overflow: hidden;">
                            <div class="content align-items-center d-flex">
                                
                                <div class="text-center" id="_container">
                                    <p class="addfiles-add-lesson" id="_container_title">ADD IMAGES</p>
                                    <div class="image-upload">
                                        <label for="file-input3">
                                            <a><i class="fas fa-plus fa-2x" id="_container_icon"></i></a>
                                        </label>
                                        <input name="photo" id="file-input3" type="file" id="profile-img"
                                            onchange="readURL(this);" required="true"
                                            accept="image/x-png,image/gif,image/jpeg" />
                                    </div>
                                </div>
                                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>




                


                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary active">CREATE</button>
                </div>
            </div>
        </div>

    </section>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>
    function readURLs(input) {
    if (input.files && input.files[0]) {

        $('#_pdf_name').html(input.files[0].name);
        var reader = new FileReader();

        reader.onload = function (e) {


        };

        reader.readAsDataURL(input.files[0]);
    }
}
        

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        $('#_container_title').html(input.files[0].name);
        reader.onload = function (e) {
            $('#_img_prev').css('background-image', 'url('+e.target.result+')');
            $('#_img_prev').css('background-size', 'cover');
            $('#_img_prev').css('background-repeate', 'no-repeat');
                
        };

        $('#_container').css({
            'padding': '20px 75px',
            'background': '#045375e6'
        });

        $('#_container_title').addClass('text-white');
        $('#_container_icon').addClass('text-white');

        reader.readAsDataURL(input.files[0]);
    }
}


</script>
<script src="<?php echo e(asset('asset/js/plugins/datetime/moment-with-locales.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/plugins/datetime/moment-timezone-with-data.js')); ?>"></script>
<script>
    $(function() {
            $("input[name='inlineRadioOptions']").click(function() {
                if ($("#inlineRadio1").is(":checked")) {
                    $("#registerdate").show();
                } else {
                    $("#registerdate").hide();
                }
            });
        });
        // $(function() {
        //     $("input[name='inlineRadioOptions']").click(function() {
        //         if ($("#inlineRadio2").is(":checked")) {
        //             $("#datetime").show();
        //         } else {
        //             $("#datetime").hide();
        //         }
        //     });
        // });
        function clickDate() {

            document.getElementById("_date").focus();

        }

</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/add-lesson.css')); ?>">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">


<style>
    #img_url {
        background: #ddd;
        width: 100px;
        height: 50px;
        display: block;
    }

    img {
        max-width: 90px;
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

    .nice-select span.current {
        color: #737171 !important;
        letter-spacing: 2px;
        font-weight: 900;
    }

    .nice-select {
        background-color: #eee !important;
    }

    .nice-select:after {
        border-bottom: 3px solid #999;
        border-right: 3px solid #999;
        height: 10px;
        width: 10px;
    }

    @media (min-width: 1200px) {
        .Ccontainer {
            max-width: 1000px !important;
        }
    }

    .nice-select.selectpicker {
        padding: 5px 61px 44px 5px;
    }

    .input-group-append {
        z-index: 9;
        margin-left: -35px;
    }

    img {
        max-width: 100%;
    }
</style>
<!-- Card -->




<style type="text/css">
    input[type="date"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }

    input[type="time"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }

    .form-control:focus {
        border-color: unset;
        box-shadow: unset;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mahad/Desktop/learnforlearning/resources/views/frontend/pages/teachers/add-lesson.blade.php ENDPATH**/ ?>