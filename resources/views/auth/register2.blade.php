@extends('layouts.master')
@section('title','level')
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
{{----}}
{{----}}

    <section class="main-section">
        <div class="container">
            <div class="main-cont">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="form-parts">
                            <div style="display:flex;width:100%;">
{{--                                <form>--}}
                                    <form  method="post" action="{{ route('adduser')}}">
                                        @csrf
                                        <div style="width:100%;">
                                        <h3 class="level-heading" >GETTING STARTED</h3>
                                    </div>
                                    <div style="width:100%;">
                                        <a href="#" id="alreasy-account">Already have an account?</a>
                                    </div>
                                    <div style="width:50%;">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
                                            <label class="custom-control-label" for="defaultUnchecked">I am a Student / Parent</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultChecked" name="defaultExampleRadios" checked>
                                            <label class="custom-control-label" for="defaultChecked">I am a Teacher</label>
                                        </div>
                                    </div>
                                    <div style="width:100%;">
                                        <input name="name" placeholder="First Name" autofocus>
                                    </div>
                                    <div style="width:100%;">
                                        <input name="name" autofocus placeholder="Last Name">
                                    </div>
                                    <div style="width:100%;">
                                        <input type = "email" name="name" placeholder="Email Address">
                                    </div>
{{--                                    <div style="width:100%;">--}}
{{--                                        <input type = "email" name="name" placeholder="Email Address">--}}
{{--                                    </div>--}}
                                    <div style="width:100%;">
                                        <input type = "password" name="name" placeholder="Choose a Password">
                                    </div>
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                        <label class="form-check-label" for="invalidCheck2">
                                            By signing up, you agree to our <a href="#" id="alreasy-account">Terms and Conditions</a> and <a href="#" id="alreasy-account">Privacy Policy</a>
                                        </label>
                                    </div>
                                    <div style="width:100%;">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Can we contact you about Learn 4 Learning?
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary active" >SAVE</button>
{{--                                    <a href="#"></a>--}}
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-center" id="submit-btn">
                            <img src="{{asset('asset/images/students/registration-banner.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
