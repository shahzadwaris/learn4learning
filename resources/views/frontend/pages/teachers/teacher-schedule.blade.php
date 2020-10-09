@extends('layouts.teachersmaster')
@section('title','Schedules')
@section('content')
@php
$teacher = Auth::user();
@endphp
<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/student-lesson-search/banner.jpg')}}">
        <div class="container">
            <h2 class="text-white text-center">MY SCHEDULE</h2>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ url('teacher-add-lesson') }}" class="main-slider-btn2 btn btn-warning" value=""
                    style="background-color: #FDBF11;color:white;padding:0 23px;">ADD LESSON</a>
            </div>
            {{-- <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
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
                </div>  --}}
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>
<!-- Card -->
<section id="about-part" class="about-tow pt-65 bg-white">
    <div class="about-shape">
    </div>
    <div class="container cfiltercontainer">
        <h6 style="color: #006796;font-size: 18px;letter-spacing: 2px;padding:0 18px;">Filter By</h5>
    </div>
    <!-- container -->
</section>


<section class="admission-row pb-120 bg-white">
    <div class="container cfiltercontainer">
        <div class="row justify-content-center">
            <form action="{{route('SearchSchedule')}}" method="get">
                {{-- @csrf --}}
                <div class="row">
                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="level_id" required="true">
                            <optgroup label="Picnic">
                                <option value="">@lang('welcome.Find_A_Course')</option>
                                @foreach($levels as $level)
                                <option value="{{$level->id}}"
                                    {{request()->level_id != '' && request()->level_id == $level->id  ? 'selected' : ''  }}>
                                    {{$level->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="subject_id" required="true">
                            <optgroup label="Picnic">
                                <option value="">Find Subjects</option>
                                @foreach($teacher->getSubjects as $subject)
                                    <option value="{{$subject->subject->id}}"
                                        {{request()->subject_id != '' && request()->subject_id == $subject->subject->id ? 'selected' : ''  }}>
                                        {{$subject->subject->name}}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="date_id" required="true">
                            <optgroup label="Picnic">
                                <option value="">Find Date</option>
                                @foreach($teacher->lessons as $lesson)
                                <option value="{{$lesson->date}}">
                                    {{$lesson->date->format('d M, Y')}}</option>
                                @endforeach
                        </select>

                    </div>

                    <div class="col-md-3" style="padding:18px;">
                        <button type="submit" class="main-slider-btn2 btn btn-warning" value=""
                            style="background-color: #FDBF11;color:white;padding:0 23px;">SEARCH</button>
                    </div>
                </div>

            </form>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<section id="course-part" class="pt-115 pb-115 bg_cover" style="background-image: url(images/course/course-shape.png)">
    <div class="container ccontainer">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-title pb-45">
                    <h2>MY SCHEDULE</h2>
                </div> <!-- section title -->
            </div>
        </div>




        <div class="row">
            @php
            if(isset($results))
            {
            $lessons = $results;
            }else{
            $lessons = $teacher->lessons;
            }

            @endphp
            @foreach($lessons as $lesson)
            <div class="col-lg-4 col-md-6 col-12 position-relatiove justify-content-center d-flex">
                <div class="_profile_image"
                    style="{{ !empty($teacher->thumbnail) ? 'background-image: url(/storage/images/'.$teacher->thumbnail.');background-size: cover;' : '' }}">


                </div>
                <div class="single-course-2 mt-30">
                    <div class="thum">
                        <div class="price">
                            <span></span>
                        </div>
                        <div class="card">
                            <img src="{{url('/storage/images/'.$lesson->thumbnail)}}">
                            <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                <h4 class="card-title text-white">{{$lesson->subject->name}}</h4>
                                <a href="{{route('studentLesson',[$lesson->id])}}">
                                    <h6 class="card-subtitle mb-2">{{$lesson->title}}</h6>
                                </a>
                                <hr>
                                <div class="link d-flex">
                                </div>
                                <div class="row" id="rating-date-lesson">
                                    <div class="col-6">
                                        <h4 class="card-title text-white">{{$lesson->date->format('d M, Y')}}<br>
                                            {{$lesson->time->format('H:i a')}}</h4>
                                    </div>
                                    <div class="col-6">
                                        <div class="review">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cont">


                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn"
                            href="{{route('EditLesson', [$lesson->id])}}"
                            style="background: gray;color: white;font-weight: 500;display: block;"><i
                                class="fas fa-edit fa-2x text-white"></i> EDIT LESSON</a>

                    </div>
                </div> <!-- single course -->
            </div>
            @endforeach
        </div> <!-- course slide -->
    </div> <!-- container -->
</section>



@endsection

@section('css')
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/student-schedule.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">

<style>
    .nice-select.selectpicker {
        width: 100% !important;
    }

    .single-slider.slider-4.bg_cover.pt-150.slick-slide.slick-current.slick-active {
        background-position: unset !important;
    }

    .single-slider {
        padding-bottom: 110px !important;
    }

    ._profile_image {
        display: inline-block;
        border: 2px solid gray;
        height: 80px;
        width: 80px;
        border-radius: 50%;
        position: absolute;
        z-index: 1;
        background: white;
    }

    @media (max-width: 1440px) {
        .ccontainer {
            max-width: 1074px;
            padding-left: 0px !important;
        }
    }

    @media (max-width: 1440px) {
        .cfiltercontainer {
            max-width: 1250px;
            padding-left: 0px !important;
        }
    }

    @media (max-width: 767.98px) and (min-width: 576px) {
        .about-tow {
            padding: 45px 0px 15px 0px !important;
        }
    }

    @media only screen and (max-width: 575.98px) {
        .admission-row {
            padding-bottom: 14px;
            width: 100%;
            margin: 0 auto;
        }
    }
</style>
@endsection
