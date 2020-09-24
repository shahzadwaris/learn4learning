@extends('layouts.master')
<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->
@section('content')
    <style>
        .section-title h5::before {
            left: 12px;
        }

        .container{

        }

        .section-title .learn-line-yellow::before{
            background-color: #fff;
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
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/teachers/banner.png')}}">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h1 data-animation="fadeInUp" data-delay="1s">FOR TEACHERS</h1>
                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>



    <!--====== SLIDER PART ENDS ======-->

    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h2 style="border-left: 49px solid #f9c033;padding-left: 15px;">Those who can, teach</h2>
                        <h5 style="border-left: 49px solid #f9c033;"></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont" style="border-left: 49px solid #f9c033;padding-left: 15px;">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <img src="{{asset('asset/images/teachers/who-can-teach.png')}}" alt="">
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-1" >
                    <img src="{{asset('asset/images/teachers/teach-from-home.png')}}" alt="">
                </div>
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h2>Teach From Home</h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div> <!-- teachers cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== CATEGORY PART START ======-->
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h2>Video Lessons</h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <img src="{{asset('asset/images/students/video-lessons.png')}}" alt="">
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== CATEGORY PART ENDS ======-->
    <!--====== ABOUT PART START ======-->
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="">
            <div class="row">
                <div class="col-lg-6 offset-lg-1" >
                    <img src="{{asset('asset/images/teachers/answer-questions.png')}}" alt="">
                </div>
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h2>Answer Questions</h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div> <!-- teachers cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== COURSE PART ENDS ======-->
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container" style="padding:0px;min-width: 100%">
            <div class="row">
                <div class="col-lg-6" style="background-color: #ffc10e;padding: 61px;">
                    <div class="section-title mt-50">
                        <h2>1 : 1 Tutoring</h2>
                        <h5 class="learn-line-yellow"></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('asset/images/teachers/tutoring.png')}}" alt="">
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== REGISTER PART START======-->

    <section id="teachers-part" class="pt-70 pb-120">
        <div class="">
            <div class="row">
                <div class="col-lg-6 offset-lg-1" >
                    <img src="{{asset('asset/images/students/track-assignments.png')}}" alt="">
                </div>
                <div class="col-lg-4 blue_space_left">
                    <div class="section-title mt-50">
                        <h2>Assign Homework</h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont" style="padding-right: 2px;">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-1 blue_space">
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; padding-bottom: 150px; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/teachers/teacher-bottom-banner.png')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h1 data-animation="fadeInUp" data-delay="1s">FOR STUDENTS</h1>
                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: white;color: black;font-weight: 500;">REGISTER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>





@endsection
