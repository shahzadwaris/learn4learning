@extends('layouts.masterStudent')
@section('title','Student Homepage')
@section('content')
@php
$user = Auth::user();
@endphp
<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/student-lesson-search/banner.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h3 class="std-welcome-msg text-white">{{$user->fname}}<br>
                            Welcome back!</h3>
                        <div class="row">
                            {{-- <div class="c"></div> --}}
                            <div class="col-7 ml-5 pl-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="What are you looking for?">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>
<!-- Card -->
{{-- dashboard section --}}
<section class="dashboard-section" style="margin-top: -10%;">
    <div class="container">
        <div class="row d-flex justify-content-center text-center h-100">
            <div class="col-6 " id="std-dashboard-left">
                <div class="stu-home-dash-head-div">
                    <p class="stu-home-dash-head-head">MY DASHBOARD</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <?php $usersimgg=$user; ?>
                        <img src="{{url('/storage/images/'. (!empty($usersimgg[0]->thumbnail) ? $usersimgg[0]->thumbnail : 'default.png') )}}"
                            alt="stud-profile-pic">
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <p class="stud-name">Hi-{{$user->fname}}</p>
                        <p class="stud-date">23/01/2012</p><br><br>
                        <a href="#" class="stu-fav-subj-link w-100 text-left" style="">My Favourite
                            Subjects</a>
                        <p class="stu-fav-subj-list w-100 text-left">{{$user->favorite_subject}}</p>
                        <p class="points-para w-100 text-left">5000 points</p>
                    </div>
                </div>
            </div>
            <div class="col-6" id="std-dashboard-right">
                <div class="row">
                    <div class="col-6 p-3" id="achieve-div">
                        <img src="{{asset('asset/images/student-homepage/achievement.png')}}" alt="">
                        <p>MY<br>ACHIEVEMENTS</p>
                    </div>
                    <div class="col-6 p-3" id="schedule-div">
                        <a href="{{ route('student_schedule') }}">
                            <img src="{{asset('asset/images/student-homepage/schedule.png')}}" alt="">
                            <p>MY<br>SCHEDULE</p>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 p-3" id="grades-div">
                        <a href="{{ route('grade.index') }}">
                            <img src="{{asset('asset/images/student-homepage/grades.png')}}" alt="">
                            <p>MY<br>GRADES</p>
                        </a>
                    </div>
                    <div class="col-6 p-3" id="homework-div">
                        <a href="{{ route('studetnsHomeWork') }}">
                            <img src="{{asset('asset/images/student-homepage/homework.png')}}" alt="">
                            <p>MY<br>HOMEWORK</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="carousel-achieve">
    <div class="container">
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                @foreach($MyAchivment as $Achivment)
                <!--First slide-->
                <div class="carousel-item active">
                    <div class="col-md-2">
                        <img class="card-img-top" src="{{url('/storage/images/'.$Achivment->img)}}"
                            alt="Card image cap">
                    </div>
                </div>
                <!--/.Third slide-->
                @endforeach
            </div>
            <!--/.Slides-->
        </div>
        <!--/.Carousel Wrapper-->
    </div>
</section>
<!--Carousel Wrapper-->
<section class="schedules">
    <div class="container">
        <h5 class="schedule-heading-teacher-homepage">My Schedule</h5>
        <hr class="teacher-home-schedule-hr">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-12 col-md-8 text-center mb-2 mt-2">
                <div class="row">
                    @foreach ($Book as $book)
                    <div class="col-4">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card image -->
                            <a href="#">
                                <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                                    <h4 class="card-title">{{date('l d/m',strtotime($book->date))}}</h4>
                                </div>
                            </a>
                            <!-- Card content -->
                            <div class="card-body">
                                <!-- Title -->
                                <p class="teach-shed-card-content">
                                    {{date('h:i ',strtotime($book->time))}} {{$book->sub_name}}
                                </p>
                                <br>
                            </div>
                            <!-- Card footer -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-12 justify-content-center text-center" id="donate-register-btn-div"
                style="margin-top: 10px">
                <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2"
                    href="{{route('student_schedule')}}" id="donate-register-btn">SEE
                    ALL</a>
            </div>
        </div>

    </div>
</section>
<section id="course-part" class=" bg_cover gray-bg">
    <section id="course-part" class=" bg_cover gray-bg"
        style="background-image: url({{asset('asset/images/teacher-homepage/grades-carousel-bgimg.png')}}">
        <div class="container">
            <div class="teacher-grade-dash-head-div">
                <p class="teacher-grade-dash-head">MY GRADES</p>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-lg-6 col-md-6 col-sm-6 item">
                    <div class="pad15">
                        <div class="card box-shadow">
                            <p data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details"
                                id="grade-btn-teach">REPORT CARD MARCH</p>
                            @foreach ($MyAchivment as $item)
                            <p class="grades-details">{{$item->Subject_name}}
                                <span>{{$item->grade == '' ? 'Not Graded Yet' : $item->grade}}</span></p>
                            @endforeach
                            <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                                <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2 grades-details"
                                    href="{{route('grade.index')}}" id="donate-register-btn">SEE ALL</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<section id="course-part" class="pt-115 pb-115 bg_cover gray-bg"
    style="background-image: url(images/course/course-shape.png)">
    <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg"
        style="background-image: url(images/course/course-shape.png)">
        <div class="container">
            <div class="teacher-homework-dash-head-div">
                <p class="teacher-homework-dash-head">@lang('teacherhome.MY_HOMEWORK')</p>
                <hr>
            </div>
            <div class="row text-center">
                <div class="MultiCarousel" style="display: flex;
justify-content: center;" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                    <div class="MultiCarousel-inner">
                        @foreach($studentHomeworks as $homework)
                        {{-- {{dd($homework)}} --}}
                        <div class="item">
                            <div class="pad15">
                                <div class="card postion-relative">
                                    <img src="{{url('/storage/images/'.$homework->thumbnail)}}" class="image-card"
                                        alt="Bologna">
                                    <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                        <div class="topright"><span
                                                class="exclamation-para">{{$homework->date}}</span><i
                                                class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i>
                                        </div>
                                        <div style="margin-bottom: 217px;">
                                            <h6 class="card-subtitle mb-2">{{$homework->subject->name}}</h6>
                                            <p class="card-subtitle mb-3">{{$homework->teacher->fname}}</p>
                                        </div>
                                    </div>
                                    <a data-animation="fadeInUp" data-delay="2s"
                                        class="main-slider-btn2 postion-absolute" id="schedule-btn-teach" href="#"
                                        style="bottom:0px;width: 100%;position:absolute;">@lang('teacherhome.LEARN_MORE')</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="btn btn-primary leftLst">
                        <</button> <button class="btn btn-primary rightLst">>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="col-12 col-12 justify-content-center text-center" id="donate-register-btn-div"
                        style="margin-top: 10px">
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2"
                            href="{{route('studetnsHomeWork')}}" id="donate-register-btn">SEE
                            ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@endsection

@section('css')
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/student-homepage.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/teacher-homepage.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style type="text/css">
    .schedules .card {
        height: auto;
    }

    .spacing-top {
        margin-top: 20px;
    }

    .card-img-top {
        height: 111px;
        width: 144px;
    }

    #donate-register-btn-div {
        display: block !important;
    }

    .image-card {
        max-width: 400px;
    }
</style>
@endsection