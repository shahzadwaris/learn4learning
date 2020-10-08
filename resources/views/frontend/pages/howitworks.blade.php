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
    <div class="single-slider slider-4 bg_cover pt-150" id="howitwork-slider-top"
        style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/howitworks/banner.png')}}"
        id="howitwork-slide">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">{{$data[0]['title']}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">{{$data[0]['discription']}}</p>
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#">I AM A
                            STUDENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#">I AM A
                            TEACHER</a>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>

<section id="header_icon" class="how-it-wor-sec-0" style="background:white">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-3.5 box_icon" style="padding: 10px">
                <a href="#">
                    <span class="single-category text-center color-1">
                        <span class="icon">
                            <img src="{{asset('asset/images/howitworks/easy.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>EASY TO USE</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>
            <div class="col-md-3.5 box_icon" style="padding: 10px">
                <a href="#">
                    <span class="single-category text-center color-1" id="how-it-work-free">
                        <span class="icon">
                            <img src="{{asset('asset/images/howitworks/free.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>FREE</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>
            <div class="col-md-3.5 box_icon" style="padding: 10px" id="tutoring">
                <a href="#">
                    <span class="single-category text-center color-1">
                        <span class="icon">
                            <img src="{{asset('asset/images/howitworks/tutoring.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>1 : 1 TUTORING</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>

        </div>
    </div>
</section>

<!--====== SLIDER PART ENDS ======-->

<section id="how-it-wor-sec-1" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 how-it-wor-sec-1-left">
                <div class="section-title mt-50">
                    <h2>{{$data[1]['title']}}</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[1]['discription']}}</p>
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#"
                        style="float: right;margin: 24px 0px 0px 0px;border-radius: 17px;">REGISTER</a>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1 how-it-wor-sec-1-right">
                <img src="{{asset('asset/images/howitworks/kid.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<section id="how-it-wor-sec-2" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 how-it-wor-sec-2-left">
                <img src="{{asset('asset/images/howitworks/kid-2.png')}}" alt="">
            </div>
            <div class="col-lg-5 how-it-wor-sec-2-right">
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
<section id="how-it-wor-sec-3" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 how-it-wor-sec-3-left">
                <div class="section-title mt-50">
                    <h2>{{$data[3]['title']}}</h2>
                    <h5></h5>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>{{$data[3]['discription']}}</p>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1 how-it-wor-sec-3-right">
                <img src="{{asset('asset/images/howitworks/kid-3.png')}}" alt="">
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<!--====== CATEGORY PART ENDS ======-->
<!--====== ABOUT PART START ======-->

<!--====== COURSE PART ENDS ======-->


<!--====== REGISTER PART START======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; padding-bottom: 50px; padding-top: 40px; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/slider/banner.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">{{$data[4]['title']}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">{{$data[4]['discription']}}</p>
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn  bottom-slider-std-par"
                            href="{{route('login')}}">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn bottom-slider-teach"
                            href="{{route('login')}}" style="">I AM A TEACHER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>
@endsection

@push('css')
<style>
    .color-1 {
        background-color: white;
        box-shadow: 0px 0px 10px -3px black;
        margin-top: -67px;
        position: relative;
    }

    .single-category .cont span {
        color: black;
        font-weight: 300;
    }
</style>
@endpush
