@extends('layouts.master')
@section('title','SignIn')
@section('content')

<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/login2.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">Login</h1>
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
{{----}}
{{----}}

<section class="main-section">
    <div class="container">
        <div class="main-cont">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="form-parts">
                        <div style="display:flex;width:100%;">
                            <form>
                                <div style="width:100%;">
                                    <h3 class="level-heading">Login</h3>
                                </div>
                                <div style="width:100%;">
                                    <input type="email" name="" placeholder="Email Address">
                                </div>
                                <div style="width:100%;">
                                    <input type="password" name="name" placeholder="Write your Password">
                                </div>
                                <div style="width:100%;">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Remember me
                                    </label>
                                </div>
                                <button type="button" class="btn btn-primary active">LOGIN</button>
                                <a href="#"></a>
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