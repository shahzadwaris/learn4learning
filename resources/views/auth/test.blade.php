@extends('layouts.master')
@section('title','level')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/test.css')}}">

    <section class="main-slider">
        <div class="single-slider pt-150">
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


    <section class="main-section bg-light" style="margin-top: -60px">
            <div class="container">
                <div class="main-cont">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <div class="form-parts">
                                <div style="display:flex;width:100%;">
                                    <form class="form" method="post" action="">
                                        @csrf
                                        <div style="width:100%;">
                                            <h3 class="level-heading" >Login</h3>
                                        </div>
                                        <div style="width:100%;">
                                            <input type = "email" name="email" placeholder="Email Address">
                                        </div>
                                        <div style="width:100%;">
                                            <input type = "password" name="password" placeholder="Write your Password">
                                        </div>
                                        <div style="width:100%;">
                                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                                            <label class="form-check-label" for="invalidCheck">
                                                Remember me
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary active" >LOGIN</button>

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
