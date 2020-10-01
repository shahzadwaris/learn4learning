<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>


<style>
    .section-title h5::before {
        left: 12px;
    }

    .container {}

    .section-title .learn-line-yellow::before {
        background-color: #fff;
    }

    #payment-pics {
        padding-top: 18px;
        padding-bottom: 30px;
        padding-left: 17px;
    }
</style>




<!--====== SLIDER PART ENDS ======-->


<section id="teachers-part" class="pt-70 pb-120" style="margin-top:100px">
    <div class="container" id="container">
        <div class="section-title mt-50 d-flex justify-content-center">
            <h2 style="text-align:center">Stripe Payment</h2>
        </div> <!-- section title -->

        <div class="div-start-padding">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 offset-md-3">
                    <!--                 <h3 class="text-center">Payment</h3>
 --> <?php if(Session::get('success_message')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success_message')); ?></div>
                    <?php endif; ?>
                    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                    <form accept-charset="UTF-8" action="<?php echo e(route('stirpepaymentgatway')); ?>" class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="pk_test_51H573bAck9Vq5GyHYwn3lDwGxFgl6lvSoOarFyayjUiDd1TbYE449wqKVMf7adpdNpJm7YpvJUA9QyuwySDtoIw400zbV8svyq"
                        id="payment-form" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input class='form-control' size='4'
                                    type='text'>
                            </div>
                        </div>
                        <div class='form-row' style="margin-top:20px">
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input autocomplete='off'
                                    class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-4 form-group cvc required' style="margin-top:20px">
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required' style="margin-top:20px">
                                <label class='control-label'>Expiration</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required' style="margin-top:20px">
                                <label class='control-label'> </label> <input class='form-control card-expiry-year'
                                    placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12'>
                                <div class='form-control total btn btn-info' style="margin-top:20px">
                                    Total: <span class='amount'><?php echo e($donate); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 form-group'>
                                <button class='form-control btn btn-primary submit-button' type='submit'
                                    style="margin-top: 20px;">Pay »</button>
                            </div>
                        </div>

                        <div class='form-row'>
                            <div class='col-md-12'>
                                <a style="background-color:#ffc10e" href="<?php echo e(route('donate')); ?>"
                                    class='form-control btn btn-success' style="margin-top: 20px;">Back</a>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                    </form>
                    <?php if((Session::has('success-message'))): ?>
                    <div class="alert alert-success col-md-12"><?php echo e(Session::get('success-message')); ?></div>
                    <?php endif; ?> <?php if((Session::has('fail-message'))): ?>
                    <div class="alert alert-danger col-md-12"><?php echo e(Session::get('fail-message')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>













    </div>
    </div> <!-- container -->
</section>
<!--====== CATEGORY PART START ======-->

<script src="https://code.jquery.com/jquery-1.12.3.min.js"
    integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
</script>
<script>
    $(function() {
              $('form.require-validation').bind('submit', function(e) {
                var $form         = $(e.target).closest('form'),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                                     'input[type=text]', 'input[type=file]',
                                     'textarea'].join(', '),
                    $inputs       = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid         = true;

                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                  var $input = $(el);
                  if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault(); // cancel on first error
                  }
                });
              });
            });

            $(function() {
              var $form = $("#payment-form");

              $form.on('submit', function(e) {
                if (!$form.data('cc-on-file')) {
                  e.preventDefault();
                  Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                  Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                  }, stripeResponseHandler);
                }
              });

              function stripeResponseHandler(status, response) {
                if (response.error) {
                  $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
                } else {
                  // token contains id, last4, and card type
                  var token = response['id'];
                  // insert the token into the form so it gets submitted to the server
                  $form.find('input[type=text]').empty();
                  $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                  $form.get(0).submit();
                }
              }
            })
</script><?php /**PATH C:\wamp64\www\learnforlearning\resources\views/frontend/pages/stirpepaymentgatways.blade.php ENDPATH**/ ?>