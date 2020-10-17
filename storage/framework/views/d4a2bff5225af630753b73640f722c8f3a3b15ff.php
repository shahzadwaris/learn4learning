<?php $__env->startSection('content'); ?>
<style>
    .activeClass
    {
        background: #fff;
        color: #555;
        border: 1px solid #ffc10e;
    }

    @media(max-width: 768px)
    {
        .customField
        {
            max-width: 100%;
            flex: 100%;
        }
    }

</style>    

<div class="search-box">
    <div class="search-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- search form -->
</div>

<!--====== SEARCH BOX PART ENDS ======-->

<!--====== SLIDER PART START ======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/donate/banner.jpg')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">We Do This Because We Care</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
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



<!--====== SLIDER PART ENDS ======-->


<section id="teachers-part" class="pt-70 pb-120">
    <div class="container" id="container">
        <div class="section-title mt-50 d-flex justify-content-center">

            <h2>Donate Here</h2>
        </div> <!-- section title -->
        <form action="<?php echo e(route('stirpepaymentgatway')); ?>" id="paymentForm" method="post">
            <?php echo csrf_field(); ?>
            <div class="row" id="row">
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
                <div class="col-lg-12" id="payment-radios">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1" name="type" value="1">
                        <label class="custom-control-label" for="defaultInline1">One-time payment</label>
                    </div>

                    <!-- Default inline 2-->
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline2" name="type" value="2">
                        <label class="custom-control-label" for="defaultInline2">Monthly payment</label>
                    </div>
                </div>
                <div class="">

                    <div class="donation-para-div">
                        <p id="donation-para">How much do you want to donate:</p>
                    </div> <!-- teachers cont -->
                </div>
            </div>

            <div class="row" id="payment-btns">
                <input type="hidden" name="price" id="appendVal">
                <div class="col-md-2.4" style="padding: 10px">
                    <label href="#">
                        <input type="hidden" value="5" name="donate" type="name">
                        <label href="#"  id="a1" class="donation-btns" onclick="selectType('a')">£5</label>
                    </label>
                </div>
                <div class="col-md-2.4" style="padding: 10px">
                    <label href="#">
                        <input type="hidden" value="10" name="donate" type="name">
                        <label href="#" id="a2" class="donation-btns" onclick="selectType('b')">£10</label>
                    </label>
                </div>
                <div class="col-md-2.4" style="padding: 10px">
                    <label href="#">
                        <input type="hidden" value="20" name="donate" type="name">
                        <label href="#" id="a3" class="donation-btns" onclick="selectType('c')">£20</label>
                    </label>
                </div>
                <div class="col-md-2.4" style="padding: 10px">
                    <label href="#">
                        <input type="hidden" value="50" name="donate" type="name">
                        <label href="#" id="a4" class="donation-btns" onclick="selectType('d')">£50</label>
                    </label>
                </div>

            </div>

            <div class="row" id="payment-pics">
                
            <div class="col-4 customField">
                <div class="form-group">
                    <label for="">Card Holder Name</label>
                    <input type="text" class="form-control" id="card_holder_name" name="card_holder_name"
                        placeholder="Name" />
                    <label>Card Number</label>
                    <div id="card-element-add" style="border:1px solid #c7c8cd;padding:9px">
                        <!--Stripe.js injects the Card Element-->
                        <div id="card-result"></div>
                    </div>
                    <span class="error-msg card_number-error"></span>
                </div>
                <button class="btn btn-dark" id="paynow">Donate</button>
            </div>
            <div class="col-md-2 text-center mt-5">OR</div>
            <div class="col-md-4">
                <div id="paypal-button-container"></div>
            </div>

    </div>

    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat
        ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum
        velit. Nam nec tellus a odio tincidunt mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit.
        Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a
        odio tincidunt mauris</p>

    </div>
<!-- container -->
</section>
<!--====== CATEGORY PART START ======-->
<section id="teachers-part" class="pt-70 pb-120 donate-sec1">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 donate-sec1-left">
                <div class="section-title mt-50">
                    <h2 class="donation-sec-heading">Don't be a cheap bastard</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons
                        equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi
                        accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris. <br> <br> auci elit cons equat
                        ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi
                        accumsan ipsum velit. Nam nec tellus a odio tincidunt mauris</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1 donate-sec1-right">
                <img src="<?php echo e(asset('asset/images/donate/cheap-bastard.jpg')); ?>" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!--====== CATEGORY PART ENDS ======-->


<section id="teachers-part" class="pt-70 pb-120  donate-sec12">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat
                    ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan
                    ipsum velit. Nam nec tellus a odio tincidunt mauris. <br> <br> auci elit cons equat ipsutis sem nibh
                    id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam
                    nec tellus a odio tincidunt mauris</p>
            </div>
            <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#"
                    id="donate-register-btn">REGISTER</a>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


<!--====== COURSE PART ENDS ======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; padding-bottom: 50px; padding-top: 40px; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url(<?php echo e(asset('asset/images/slider/banner.jpg')); ?>">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">REGISTER</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#"
                            style="background: white;color: black;font-weight: 500;">I AM A
                            STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#"
                            style="background: white;color: black;font-weight: 500;PADDING: 0PX 71PX;">I AM A
                            TEACHER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('asset/css/donate.css')); ?>">
<style>
    .section-title h5::before {
        /* left: 12px; */
    }

    .container {}

    .section-title .learn-line-yellow::before {
        background-color: #fff;
    }

    #payment-pics {
        padding-top: 18px;
        padding-bottom: 30px;
        padding-left: 0px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('js'); ?>
<script
    src="https://www.paypal.com/sdk/js?client-id=Af_hkAJriAisK0jqeXxt1FjssUB-vYNqW8pAkvp1RFMPkpu_mKjT29aNZxj4Yvn1Mq1K4N78zIwuTvJI">
</script>
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo e(asset('asset/js/stripe.js')); ?>"></script>
<script>

    function selectType(val) {
        if(val == 'a') {
            $('#a1').addClass('activeClass');
            $('#a2').removeClass('activeClass');
            $('#a3').removeClass('activeClass');
            $('#a4').removeClass('activeClass');
            $('#appendVal').val(10);
        }
        if(val == 'b') {
            $('#a1').removeClass('activeClass');
            $('#a2').addClass('activeClass');
            $('#a3').removeClass('activeClass');
            $('#a4').removeClass('activeClass');
            $('#appendVal').val(20);
        }
        if(val == 'c') {
            $('#a1').removeClass('activeClass');
            $('#a2').removeClass('activeClass');   
            $('#a3').addClass('activeClass');   
            $('#a4').removeClass('activeClass');   
            $('#appendVal').val(30);
        }
        if(val == 'd') {
            $('#a1').removeClass('activeClass');
            $('#a2').removeClass('activeClass');   
            $('#a3').removeClass('activeClass');   
            $('#a4').addClass('activeClass');   
            $('#appendVal').val(40);
        }
    }


    $(function() {
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(e.target).closest('form'),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;

        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
    });
});
</script>
<script>
    paypal.Buttons({
            createOrder: function(data, actions) {
              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: document.querySelector('input[name="price"]').value
                  }
                }]
              });
            },
            onApprove: function(data, actions) {
              return actions.order.capture().then(function(details) {
                alert('Thank for your donation ' + details.payer.name.given_name);
              });
            }
          }).render('#paypal-button-container'); // Display payment options on your web page
</script>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mustafa/Desktop/rikxtech/learnforlearning/resources/views/frontend/pages/donate.blade.php ENDPATH**/ ?>