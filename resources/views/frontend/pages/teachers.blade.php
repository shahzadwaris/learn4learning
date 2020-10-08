@extends('layouts.master')
<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->
@section('content')
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
    <div class="single-slider slider-4 bg_cover pt-150"
        style="padding-bottom: 149px;padding-top: 170px;background-size: auto !important; background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/teachers/banner.png')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">{{$data[0]['title']}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">{{$data[0]['discription']}}</p>
                        {{--                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>



<!--====== SLIDER PART ENDS ======-->

<section id="for-teach-sec-1" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h2 style="border-left: 49px solid #f9c033;padding-left: 15px;">{{$data[1]['title']}}</h2>
                    <h5 style="border-left: 49px solid #f9c033;"></h5>
                </div> <!-- section title -->
                <div class="teachers-cont" style="border-left: 49px solid #f9c033;padding-left: 15px;">
                    <p>{{$data[1]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1">
                <img src="{{asset('asset/images/teachers/who-can-teach.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section id="for-teach-sec-2" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1">
                <img src="{{asset('asset/images/teachers/teach-from-home.png')}}" alt="">
            </div>
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h2>{{$data[2]['title']}}</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[2]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!--====== CATEGORY PART START ======-->
<section id="for-teach-sec-3" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h2>{{$data[3]['title']}}</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[3]['discription']}}</p>
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
<section id="for-teach-sec-4" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1">
                <img src="{{asset('asset/images/teachers/answer-questions.png')}}" alt="">
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="section-title mt-50">
                    <h2>{{$data[4]['title']}}</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[4]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!--====== COURSE PART ENDS ======-->
<section id="for-teach-sec-5" class="pt-70 pb-120">
    <div class="container" style="padding:0px;min-width: 100%">
        <div class="row">
            <div class="col-lg-6" style="background-color: #ffc10e;padding: 61px;">
                <div class="section-title mt-50">
                    <h2>{{$data[5]['title']}}</h2>
                    <h5 class="learn-line-yellow"></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[5]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6">
                <img src="{{asset('asset/images/teachers/tutoring.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== REGISTER PART START======-->

<section id="for-teach-sec-6" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1">
                <img src="{{asset('asset/images/students/track-assignments.png')}}" alt="">
            </div>
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h2 style="border-right: 140px solid #036893;">{{$data[6]['title']}}</h2>
                    <h5 style="border-right: 140px solid #036893;"></h5>
                </div> <!-- section title -->
                <div class="teachers-cont" style="border-right: 140px solid #036893;padding-right: 2px;">
                    <p>{{$data[6]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150" id="teache-slider-bottom"
        style="background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/teachers/teacher-bottom-banner.png')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">{{$data[7]['title']}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">{{$data[7]['discription']}}</p>
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#"
                            style="background: white;color: black;font-weight: 500;">REGISTER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>
@endsection

@push('css')
<style>
    .section-title h5::before {
        left: 12px;
    }

    .container {}

    .section-title .learn-line-yellow::before {
        background-color: #fff;
    }
</style>
@endpush
