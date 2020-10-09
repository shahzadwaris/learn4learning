@extends('layouts.teachersmaster')
@section('title','Student Homework')
@section('content')

<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/teacher-homework-assign.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">


<section id="slider-part" class="slider-active">
  <div class="single-slider slider-4 bg_cover pt-150"
    style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/student-lesson-search/banner.jpg')}}">
    <div class="container">
      <div class="row justify-content-center">
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
      </div> <!-- row -->
    </div> <!-- container -->
  </div> <!-- single slider -->
</section>
<!-- Card -->

<section id="about-part" class="about-tow pt-65">
  <div class="about-shape">
  </div>
  <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 5px;">Find A Lesson</h5>
  <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== ADMISSION PART START ======-->


<section class="dashboard-section">
  <div class="container">
    <div class="row d-flex justify-content-center text-center h-100">
      <div class="col-12" id="std-dashboard-left">
        <div class="stu-home-dash-head-div">
          <p class="stu-home-dash-head-head">ASSIGN HOMEWORK</p>
          <hr>
        </div>
        @if(session()->has('message.level'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Alert:</strong> {!! session('message.content') !!}
        </div>

        @endif
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12 justify-content-center text-center">
            <img src="{{url('/storage/images/'.$getfurthwerdetailsdteacher[0]->thumbnail)}}" alt=""
              id="stud-profile-pic">
          </div>
          <div class="col-md-8 col-sm-8 col-xs-12 justify-content-center text-center">
            <p class="stud-date"><b>Subject</b> {{$getfurthwerdetailsdteacher[0]->sub_name}}</p><br>
            <p class="stud-date"><b>Title:</b> {{$getfurthwerdetailsdteacher[0]->title}}</p><br>
            <p class="stud-date"><b>Due Date</b>{{$getfurthwerdetailsdteacher[0]->date}}</p>
            <form action="{{route('teacher.addHomework')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group green-border-focus">
                <textarea class="form-control" name="descriptions" id="exampleFormControlTextarea5" rows="6"></textarea>
              </div>
              <div class="row">
                <input type="hidden" name="Sub_id" value="{{$getfurthwerdetailsdteacher[0]->subjectid}}">
                <input type="hidden" name="lesson" value="{{$lesson}}">
                <input type="hidden" name="date" value="{{$getfurthwerdetailsdteacher[0]->date}}">


                <div class="col-5">
                  <div class="form-group">
                    <input type="file" class="filestyle" name="img" data-icon="false"
                      accept="application/pdf,application/vnd.ms-excel">
                  </div>
                </div>
                <div class="col-2">

                </div>
                <div class="col-5">
                  <button type="submit" class="btn btn-primary active">SEND</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
