<!-- {{--@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])--}}

{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-5 ml-auto">--}}
{{--            <div class="info-area info-horizontal mt-5">--}}
{{--                <div class="icon icon-warning">--}}
{{--                    <i class="tim-icons icon-wifi"></i>--}}
{{--                </div>--}}
{{--                <div class="description">--}}
{{--                    <h3 class="info-title">{{ __('Marketing') }}</h3>--}}
{{--                    <p class="description">--}}
{{--                        {{ __('We\'ve created the marketing campaign of the website. It was a very interesting collaboration.') }}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="info-area info-horizontal">--}}
{{--                <div class="icon icon-primary">--}}
{{--                    <i class="tim-icons icon-triangle-right-17"></i>--}}
{{--                </div>--}}
{{--                <div class="description">--}}
{{--                    <h3 class="info-title">{{ __('Fully Coded in HTML5') }}</h3>--}}
{{--                    <p class="description">--}}
{{--                        {{ __('We\'ve developed the website with HTML5 and CSS3. The client has access to the code using GitHub.') }}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="info-area info-horizontal">--}}
{{--                <div class="icon icon-info">--}}
{{--                    <i class="tim-icons icon-trophy"></i>--}}
{{--                </div>--}}
{{--                <div class="description">--}}
{{--                    <h3 class="info-title">{{ __('Built Audience') }}</h3>--}}
{{--                    <p class="description">--}}
{{--                        {{ __('There is also a Fully Customizable CMS Admin Dashboard for this product.') }}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-7 mr-auto">--}}
{{--            <div class="card card-register card-white">--}}
{{--                <div class="card-header">--}}
{{--                    <img class="card-img" src="{{ asset('black') }}/img/card-primary.png" alt="Card image">--}}
{{--                    <h4 class="card-title">{{ __('Register') }}</h4>--}}
{{--                </div>--}}
{{--                <form class="form" method="post" action="{{ route('register') }}">--}}
{{--                    @csrf--}}

{{--                    <div class="card-body">--}}
{{--                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <div class="input-group-text">--}}
{{--                                    <i class="tim-icons icon-single-02"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">--}}
{{--                            @include('alerts.feedback', ['field' => 'name'])--}}
{{--                        </div>--}}
{{--                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <div class="input-group-text">--}}
{{--                                    <i class="tim-icons icon-email-85"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">--}}
{{--                            @include('alerts.feedback', ['field' => 'email'])--}}
{{--                        </div>--}}
{{--                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <div class="input-group-text">--}}
{{--                                    <i class="tim-icons icon-lock-circle"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">--}}
{{--                            @include('alerts.feedback', ['field' => 'password'])--}}
{{--                        </div>--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <div class="input-group-text">--}}
{{--                                    <i class="tim-icons icon-lock-circle"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">--}}
{{--                        </div>--}}
{{--                        <div class="form-check text-left">--}}
{{--                            <label class="form-check-label">--}}
{{--                                <input class="form-check-input" type="checkbox">--}}
{{--                                <span class="form-check-sign"></span>--}}
{{--                                {{ __('I agree to the') }}--}}
{{--                                <a href="#">{{ __('terms and conditions') }}</a>.--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Get Started') }}</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
 -->

@extends('layouts.master')
@section('title','SignUp')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/register2.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">

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
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="form-parts">


                            <div style="display:flex;width:100%;">

                                <form  method="post" action="{{url('signup')}}" id="form">
                                    @csrf
                                    <div style="width:100%;">
                                        <h3 class="level-heading" >GETTING STARTED</h3>
                                    </div>
                                    <div style="width:100%;">
                                        <a href="#" id="alreasy-account">Already have an account?</a>
                                    </div>
                                    <div style="width:50%;">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="student"  id="defaultUnchecked" name="type">
                                            <label class="custom-control-label" for="defaultUnchecked">I am a Student / Parent</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="teacher" id="defaultChecked" name="type" checked>
                                            <label class="custom-control-label" for="defaultChecked">I am a Teacher</label>
                                        </div>
                                    </div>
                                     @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
                                    <div style="width:100%;">
                                        <input name="fname" autofocus placeholder="First Name">
                                    </div>
                                    <div style="width:100%;">
                                        <input name="lname" autofocus placeholder="Last Name">
                                    </div>
                                    <div style="width:100%;">
                                        <input type = "email" name="email" placeholder="Email Address">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{$errors->first('email')}}</div>

                                        @endif
                                    </div>

                                    <div style="width:100%;">
                                        <input type = "password" name="password" placeholder="Choose a Password">
                                    </div>
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2">
                                        <label class="form-check-label" for="invalidCheck2">
                                            By signing up, you agree to our <a href="#" id="alreasy-account">Terms and Conditions</a> and <a href="#" id="alreasy-account">Privacy Policy</a>
                                        </label>
                                    </div>
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                                        <label class="form-check-label" for="invalidCheck">
                                            Can we contact you about Learn 4 Learning?
                                        </label>
                                    </div>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary active" >SignUp</button>
                                </form>
                            </div>
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
@endsection
@section('js')
{{----}}
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
@endsection
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {
            fname: {
                required: true
                 range: ['A', 'Z']
            },
            email: {
                required: true,
                email: true
            },
            lname: {
                required: true,
                digits: true
                
            },
              password: {
                required: true,
                digits: true
                
            },
    

        }
    });
});
</script>
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
       <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>