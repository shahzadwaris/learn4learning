@extends('layouts.master')
@section('title','Teacher Profile')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/teacher-profile.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('asset/css/mdb.min-for-teacher-homepage.css')}}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/teacher-homepage/teaching_banner.jpg')}}">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h3 class="std-welcome-msg">{{$user[0]['fname']}},<br>
                                Welcome back!</h3>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="What are you looking for?">
                                <div class="input-group-append">
                                  <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                              </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
<!-- Card -->

{{-- dashboard section --}}

<section class="dashboard-section">
    <div class="container">
        <div class="row d-flex justify-content-center text-center h-100">
            <div class="col-12" id="std-dashboard-left">
                <div class="stu-home-dash-head-div">
                    <p class="stu-home-dash-head-head">TEACHER PROFILE</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{url('/storage/images/'.$user[0]->thumbnail)}}" alt="" id="stud-profile-pic">
                    </div>
                    <div class="col-8">
                        <p class="stud-name">{{$user[0]['fname']}}-{{$user[0]['lname']}}</p><br>
                        <p class="stud-date"><b>Country</b>{{$user[0]['country']}}</p><br>
                        <p class="stud-date"><b>Education:</b> Master Degree</p><br>
                        <p class="stud-date"><b>Experience</b></p>
                        <p class="stud-date">Year</p>
                        <p class="stud-date">Location</p>
                        <p class="stud-date">Title</p>    <br>
                        <p class="stud-date"><b>Subjects:</b> Maths, Chemistry, Biology</p>    <br>
                        <p class="stud-date"><b>Levels Taught: </b> Primary School, Secondary School</p>    <br>
                        <p class="stud-date"><b>Description: </b>{{$user[0]['description']}}</p><br>
{{--                        <p class="stud-date">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p><br>--}}

                        <p class="stud-date"><b>Available for 1:1: </b> Yes</p>    <br>
                        <div class="col-12 col-12" id="donate-register-btn-div">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">CONTACT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Carousel Wrapper-->

{{-- end-dashboard section --}}



    @endsection
