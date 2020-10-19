@extends('layouts.teachersmaster')
@section('title','Teacher Homepage')
@section('content')
<style>
    .customStyle{
        width: 140px;
        height: 140px;
    }
    .customAlertDAngerContainer{
        display: flex;
        justify-content: center;
    }
    .customDanger{
        background-color: #ffc10e;
        color: #fff;
        width: 100%;
        font-size: 1rem;
        padding: .75rem 1.25rem;
        border: 1px solid transparent;
    }
    .customAlertDAnger{
        background-color: #ffc10e;
        color: #fff;
        width: 100%;
        font-size: 1rem;
        padding: .75rem 1.25rem;
        border: 1px solid transparent;
    }
    .customDangerContainer{
        display: flex;
        justify-content: center;
    }
</style>
    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150"
             style="padding-top: 238px;padding-bottom: 238px;background-repeat: no-repeat; background:linear-gradient(rgb(0 0 0 / 17%) 100%, rgb(0 0 0 / 16%) 100%), url({{asset('asset/images/teacher-homepage/teaching_banner.jpg')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h3 class="std-welcome-msg">Hi-{{Auth::user()->fname}}<br>
                                @lang('teacherhome.Welcome_back')</h3>
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
                <div class="col-lg-6 col-sm-12 col-xs-12" id="std-dashboard-left">
                    <div class="stu-home-dash-head-div px-4">
                        <p class="stu-home-dash-head-head">@lang('teacherhome.DASHBOARD')</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                            <img src="{{url('/storage/images/'. (!empty($usersimgg[0]->thumbnail) ? $usersimgg[0]->thumbnail : 'default.png') )}}"
                                 alt="stud-profile-pic" class="customStyle">
                        </div>
                        <div class="col-lg-8 col-sm-12 col-xs-12">
                            <p class="stud-name pb-3">{{Auth::user()->fname}}-{{Auth::user()->lname}}</p>
                            <p class="stud-date">{{Auth::user()->description}}</p>
                            <p class="teacher-exper-head pb-3 pt-3">@lang('teacherhome.EXPERIENCE')
                            <p class="text-white text-left">{{ Auth::user()->experience }}</p>
                            <p class="stud-date ">
                            </p><br><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" id="std-dashboard-right">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12" id="achieve-div">
                            <a href="{{route('MyAchevemnt')}}">
                                <img src="{{asset('asset/images/teacher-homepage/teacher-messages.png')}}" alt="">
                                <p class="teacher-measages">@lang('teacherhome.MY')<br>@lang('teacherhome.ACHIEVEMENTS')</p>
                            </a>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12" id="schedule-div">
                            <a href="{{route('teacherSchedule')}}"><img
                                    src="{{asset('asset/images/student-homepage/schedule.png')}}" alt=""></a>
                            <p>@lang('teacherhome.MY')<br>@lang('teacherhome.SCHEDULE')</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12" id="grades-div">
                            <a href="{{route('teacherAddLesson')}}"><img
                                    src="{{asset('asset/images/teacher-homepage/add-lesson-teacher.png')}}" alt=""></a>
                            <p>Add<br>Lesson</p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12" id="homework-div">
                            <a href="{{route('teacherHomeWork')}}"><img
                                    src="{{asset('asset/images/student-homepage/homework.png')}}" alt=""></a>
                            <p class="teacher-measages">@lang('teacherhome.MY')<br>@lang('teacherhome.MY_HOMEWORK')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Carousel Wrapper-->
    <section class="schedules">
        <div class="container">
            <h5 class="schedule-heading-teacher-homepage">My Schedule</h5>
            <hr class="teacher-home-schedule-hr">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-12 text-center mb-2 mt-2">
                    <div class="row">
                        @if(count($schedules) == 0)
                            <div class="alert alert-danger customDanger">
                                <div class="container customDangerContainer">
                                    <div class="alert-icon">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    </div>&nbsp;&nbsp;&nbsp;No Schedule Found
                                </div>
                            </div>
                        @else
                            @foreach ($schedules as $schedule)
                            <div class="col-3 customStyleResponsive">
                                <!-- Card -->
                                <div class="card">
                                    <!-- Card image -->
                                    <a href="#">
                                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                                            <h5 class="text-white">{{date('l d/m',strtotime($schedule->date))}}</h5>
                                        </div>
                                    </a>
                                    <!-- Card content -->
                                    <div class="card-body">
                                        <!-- Title -->
                                        <p class="teach-shed-card-content">
                                            {{date('h:i ',strtotime($schedule->time))}} {{$schedule->sub_name}}
                                        </p>
                                        <br>
                                    </div>
                                    <!-- Card footer -->
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if(count($schedules) != 0)
            <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div" style="margin-top: 10px">
                <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="{{ url('teacher-schedule') }}"
                   id="donate-register-btn">SEE ALL</a>
            </div>
            @endif
        </div>
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
                <div class="row">
                    @if(count($teacherhomeworkdetail) == 0)
                        <div class="alert alert-danger customAlertDAnger">
                            <div class="container customAlertDAngerContainer">
                                <div class="alert-icon">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                </div>
                                &nbsp;&nbsp;&nbsp;No Home Work Found
                            </div>
                        </div>
                    @else
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel" data-interval="1000">
                        <div class="MultiCarousel-inner">
                            @foreach($teacherhomeworkdetail as $teacherhomeworkdetail)
                                <div class="item">
                                    <div class="pad15">
                                        <div class="card postion-relative">
                                            <img class="card-img"
                                                 src="  {{url('/storage/images/'.$teacherhomeworkdetail->lesson_thum)}}"
                                                 alt="Bologna" height="100%">
                                            <div class="card-img-overlay text-white d-flex flex-column justify-content-center">

                                                <div style="margin-bottom: 217px;">
                                                    <h6 class="card-subtitle mb-2">{{$teacherhomeworkdetail->subjectname}}</h6>
                                                    <p class="card-subtitle mb-3">{{$teacherhomeworkdetail->fname}}</p>
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
                    @endif
                </div>
                @if(count($teacherhomeworkdetail) != 0)
                <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#"
                       id="donate-register-btn">SEE ALL</a>
                </div>
                @endif
            </div>
        </section>
@endsection
@push('css')
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{asset('asset/css/teacher-homepage.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('asset/css/mdb.min-for-teacher-homepage.css')}}">
        <style type="text/css">
            .schedules .card {
                height: auto;
            }
            .spacing-top {
                margin-top: 20px;
            }
        </style>
@endpush
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
                $(document).ready(function () {
                    var itemsMainDiv = ('.MultiCarousel');
                    var itemsDiv = ('.MultiCarousel-inner');
                    var itemWidth = "";

                    $('.leftLst, .rightLst').click(function () {
                        var condition = $(this).hasClass("leftLst");
                        if (condition)
                            click(0, this);
                        else
                            click(1, this)
                    });

                    ResCarouselSize();




                    $(window).resize(function () {
                        ResCarouselSize();
                    });

                    //this function define the size of the items
                    function ResCarouselSize() {
                        var incno = 0;
                        var dataItems = ("data-items");
                        var itemClass = ('.item');
                        var id = 0;
                        var btnParentSb = '';
                        var itemsSplit = '';
                        var sampwidth = $(itemsMainDiv).width();
                        var bodyWidth = $('body').width();
                        $(itemsDiv).each(function () {
                            id = id + 1;
                            var itemNumbers = $(this).find(itemClass).length;
                            btnParentSb = $(this).parent().attr(dataItems);
                            itemsSplit = btnParentSb.split(',');
                            $(this).parent().attr("id", "MultiCarousel" + id);


                            if (bodyWidth >= 1200) {
                                incno = itemsSplit[1];
                                itemWidth = sampwidth / incno;
                            }
                            else if (bodyWidth >= 992) {
                                incno = itemsSplit[2];
                                itemWidth = sampwidth / incno;
                            }
                            else if (bodyWidth >= 768) {
                                incno = itemsSplit[1];
                                itemWidth = sampwidth / incno;
                            }
                            else {
                                incno = itemsSplit[0];
                                itemWidth = sampwidth / incno;
                            }
                            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                            $(this).find(itemClass).each(function () {
                                $(this).outerWidth(itemWidth);
                            });

                            $(".leftLst").addClass("over");
                            $(".rightLst").removeClass("over");

                        });
                    }


                    //this function used to move the items
                    function ResCarousel(e, el, s) {
                        var leftBtn = ('.leftLst');
                        var rightBtn = ('.rightLst');
                        var translateXval = '';
                        var divStyle = $(el + ' ' + itemsDiv).css('transform');
                        var values = divStyle.match(/-?[\d\.]+/g);
                        var xds = Math.abs(values[4]);
                        if (e == 0) {
                            translateXval = parseInt(xds) - parseInt(itemWidth * s);
                            $(el + ' ' + rightBtn).removeClass("over");

                            if (translateXval <= itemWidth / 2) {
                                translateXval = 0;
                                $(el + ' ' + leftBtn).addClass("over");
                            }
                        }
                        else if (e == 1) {
                            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                            translateXval = parseInt(xds) + parseInt(itemWidth * s);
                            $(el + ' ' + leftBtn).removeClass("over");

                            if (translateXval >= itemsCondition - itemWidth / 2) {
                                translateXval = itemsCondition;
                                $(el + ' ' + rightBtn).addClass("over");
                            }
                        }
                        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
                    }

                    //It is used to get some elements from btn
                    function click(ell, ee) {
                        var Parent = "#" + $(ee).parent().attr("id");
                        var slide = $(Parent).attr("data-slide");
                        ResCarousel(ell, Parent, slide);
                    }
                });
            </script>
@endsection
