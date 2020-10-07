@extends('layouts.master')
@section('title','SignIn')
@section('content')
<style>
    .gray_font {
        color: #737171 !important;
        letter-spacing: 2px;
    }

    .text_gray {
        color: #737171 !important;
    }
</style>
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/login2.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">LOGIN</h1>
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
    <div class="container">
        <div class="main-cont">
            <div class="row">
                <div class="col-lg-6 d-flex pt-4 justify-content-center">
                    <div class="form-parts">
                        <div style="display:flex;width:100%;">
                            <form class="form" method="post" action="{{ route('login') }}">
                                @csrf
                                <div style="width:100%;">
                                    <h3 class="level-heading">Login</h3>
                                </div>




                                @if(session()->has('message.level'))

                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {!! session('message.content') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

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
                                    <a href="{{route('password.request')}}" class="form-check-label ml-5">Forgot
                                        Password?</a>
                                </div>




                                <button type="submit" class="btn btn-primary active">LOGIN</button>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 p-0">
                    <div class="d-flex" id="submit-btn">
                        <img class="img-responsive  "
                            src="{{asset('asset/images/students/registration-banner_50.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection