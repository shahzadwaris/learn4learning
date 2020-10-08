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
             style="padding-bottom: 149px;padding-top: 172px;background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/students/banner.png')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h1 data-animation="fadeInUp" data-delay="1s">{{$data[0]['title']}}</h1>
                            <p data-animation="fadeInUp" data-delay="1.5s">{{$data[0]['discription']}}</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>


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
        style="padding-bottom: 149px;padding-top: 172px;background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/students/banner.png')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">{{$data[0]['title']}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">{{$data[0]['discription']}}</p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>

<!--====== SLIDER PART ENDS ======-->

<section id="for-std-sec-1" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 std-sec1-left">
                <div class="section-title mt-50">
                    <h2 style="border-left: 49px solid #f9c033;padding-left: 15px;">{{$data[1]['title']}}</h2>
                    <h5 style="border-left: 49px solid #f9c033;"></h5>
                </div> <!-- section title -->
                <div class="teachers-cont" style="border-left: 49px solid #f9c033;padding-left: 15px;">
                    <p>{{$data[1]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1 std-sec1-right">
                <img src="{{asset('asset/images/students/choose-subjects.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section id="for-std-sec-2" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 std-sec2-left">
                <img src="{{asset('asset/images/students/inspirational-teacher.png')}}" alt="">
            </div>
            <div class="col-lg-5 std-sec2-right">
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
<section id="for-std-sec-3" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 std-sec3-left">
                <div class="section-title mt-50">
                    <h2>{{$data[3]['title']}}</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[3]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1 std-sec3-right">
                <img src="{{asset('asset/images/students/video-lessons.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!--====== CATEGORY PART ENDS ======-->
<!--====== ABOUT PART START ======-->
<section id="for-std-sec-4" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 std-sec4-left">
                <img src="{{asset('asset/images/students/ask-questions.png')}}" alt="">
            </div>
            <div class="col-lg-5 std-sec4-right">
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
<section id="for-std-sec-5" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 std-sec5-left" style="background-color: #ffc10e;padding: 61px;">
                <div class="section-title mt-50">
                    <h2>{{$data[5]['title']}}</h2>
                    <h5 class="learn-line-yellow"></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[5]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-5 std-sec5-right">
                <img src="{{asset('asset/images/students/learn4learning.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== REGISTER PART START======-->

<section id="for-std-sec-6" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 std-sec6-left">
                <img src="{{asset('asset/images/students/track-assignments.png')}}" alt="">
            </div>
            <div class="col-lg-5 std-sec6-right">
                <div class="section-title mt-50">
                    <h2>{{$data[6]['title']}}</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[6]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-2 std-sec6-very-right">
                <img src="{{asset('asset/images/students/student-last-sec.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; padding-bottom: 40px; padding-top: 25px; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/slider/banner.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">{{$data[7]['title']}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">{{$data[7]['discription']}}</p>
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn"
                            href="{{route('register')}}"
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
        left: 0px;
    }

    .container {}

    .section-title .learn-line-yellow::before {
        background-color: #fff;
    }
</style>
@endpush
