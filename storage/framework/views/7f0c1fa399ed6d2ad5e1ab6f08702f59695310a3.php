<?php $__env->startSection('title','level'); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('asset/js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="<?php echo e(asset('asset/css/teachers-subjects.css')); ?>">
<link href="http://www.ansonika.com/potenza/css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo e(asset('asset/css/mdb.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('asset/css/subjects-form-boxes.css')); ?>">
<style>
    .customStyleBtn{
        background-color:#ffc10e !important;
        color:#fff;
        border-radius: 5px;
    }
    .alert-danger {
        color: #fff !important;
        background-color: #ffc10e !important;
        border-color: #ffc10e !important;
    }
    footer {
        border-top: 1px solid #ededed;
        padding: 0px 0;
    }
</style>
<?php
    $emailVerified = \Auth::user()->email_verified_at;
    if(isset($verified)) {
        $emailVerified = isset($emailVerified) ? $emailVerified : $verified;
    } else {
        $emailVerified = $emailVerified;
    }
?>
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
    <form action="<?php echo e(route('teacherSubjects')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="container customContaine" style="width:80%">

            <div class="main-cont">

                <div class="row">
                     <?php if(session()->has('error_message')): ?>
                        <div class="alert alert-danger" style="text-align:center;width:100%;border:0px !important; text-transform: capitalize;">
                            <?php echo e(session()->get('error_message')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="col-md">
                        <h3 class="level-heading">WHAT SUBJECTS DO YOU WANT TO TEACH?</h3>
                    </div>

                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sub_chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6">
                        <?php $__currentLoopData = $sub_chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                            <div class="form-parts">
                                <div class="step">
                                    <div class="form-group">
                                        <label class="container_check version_2"><?php echo e($sub['name']); ?>

                                            <input type="checkbox" name="subject[]" value="<?php echo e($sub['id']); ?>"
                                                data-toggle="collapse" data-target="#a<?php echo e($sub->id); ?>">
                                            <span class="checkmark"></span>
                                            <div id="lavel_table">
                                                <div id="a<?php echo e($sub->id); ?>" class="collapse">
                                                    <p><b>Select level(s) you want to teach</b></p>

                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label class="container_check version_2"
                                                                    style="border:unset!important;">Primary
                                                                    <input type="checkbox" checked
                                                                        name="subject_<?php echo e($sub['id']); ?>_level[]" value="1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="container_check version_2"
                                                                    style="border:unset!important;">Secondary
                                                                    <input type="checkbox"
                                                                        name="subject_<?php echo e($sub['id']); ?>_level[]" value="2">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <label class="container_check version_2"
                                                                    style="border:unset!important;">Further Education
                                                                    <input type="checkbox"
                                                                        name="subject_<?php echo e($sub['id']); ?>_level[]" value="3">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="col-lg-6 _regSubLP" style="padding-left:0px;">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <div class="form-parts">
                    <div class="step">
                        <div class="form-group">
                            <label class="container_check version_2">Other
                                <input type="checkbox" name="subject[]" value="" data-toggle="collapse"
                                    data-target="#a00_other_id" id="other">
                                <span class="checkmark"></span>
                                <div id="others"></div>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>

        <div class="col-lg-12 text-left" style="padding-left:40px">
            <div class="col-md-12 d-flex">
                <div class="form-parts">
                    <div class="step">
                        <button type="submit" class="btn btn-primary active justify-content-center"
                            style="align-content: center;">Register</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">

        </div>
        </div>
    </form>
</section>


<!-- Modal -->
<?php if(!$emailVerified): ?>
    <div id="myModal" style=" width: 100%;
    background: #5555;   display: flex;
    align-items: center;" class="modal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title alert alert-danger" style="width:100%;">Verify Email Address</h4>
          </div>
          <div class="modal-body">
            <p>Please First Verify Email Address.We Send You An Verification Email.Or You Can Change Your Email Address</p>
              <div class="row">
                   <input type="email" class="form-control" placeholder="Enter Your Email..." name="email" id="emailAddress" value="" />
              </div>
          </div>
          <div class="modal-footer">
            <button onclick="resendEmail()" class="btn btn-success customStyleBtn">
                <i class="fa fa-refresh fa-spin" id="fa-faSpin" style="display: none"></i>
                Resend Email
            </button>
         </div>
        </div>
      </div>
    </div>
<?php endif; ?>
<script>
    function resendEmail(){
        let email = $('#emailAddress').val();
        email = email ? email : 'null';
        $('#fa-faSpin').show();
        let url = '/resend-email/'+email;
        $.ajax({
            url:url,
            method:'GET',
            success: function(response) {
                console.log('response');
                console.log(response);
                $('#fa-faSpin').hide();
                toastr.success('email resend successfully please check you email address..!');
            },
            error: function(error) {
                console.log('error');
                console.log(error);
                $('#fa-faSpin').hide();
            }
        });

    }

    function saveSubject(lever_id) {
            var subject = document.getElementById('subject');
            if(subject.value === ''){
                subject.setAttribute('style','border:1px solid red');
            }else{
                subject.removeAttribute('style');
                $.ajax({
                    type: 'get',
                    url  : '<?php echo e(route("save-new-subject")); ?>',
                    data : {'subject':subject.value,'level_id':lever_id},
                    success: function (response) {
                        console.log(response)
                        if(response === 'true'){
                            location.reload();
                        }else{
                            alert('subject already saved');
                        }
                    } ,
                    error:function () {
                        alert('subject not saved');
                    }
                });
            }
        }
</script>

<script type="text/javascript">
    $('#myModal').modal('show');
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false
    })
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" placeholder="Other Subject" style="position: relative;opacity: 1;cursor: revert;" name="field_name[]" class="form-control"  value=""/><a href="javascript:void(0);" class="remove_button mt-3 mb-2 d-flex justify-content-end" style="color:black;text-decoration: underline;font-size: 15px">DROP FIELD</div>'; //New input field html
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.teachersmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/auth/teachers/teacher-subjects.blade.php ENDPATH**/ ?>