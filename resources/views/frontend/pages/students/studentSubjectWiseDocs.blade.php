@extends('layouts.masterStudent')
@section('title','Student Homework')
@section('content')
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
          <p class="stu-home-dash-head-head">Upload HOMEWORK</p>
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
            <img src="{{url('/storage/images/'.$teacherhomeworkdetaild->thumbnail)}}" alt="" id="stud-profile-pic">
          </div>
          <div class="col-md-8 col-sm-8 col-xs-12 justify-content-center text-center">
            <p class="stud-date"><b>Subject</b> {{$teacherhomeworkdetaild->subname}}</p><br>
            <p class="stud-date"><b>Title:</b> {{$teacherhomeworkdetaild->title}}</p><br>
            <p class="stud-date"><b>Due Date</b>{{$teacherhomeworkdetaild->date}}</p>
            <h3 style="color:white">Detail</h3>
            <p id="exampleFormControlTextarea5" rows="6"> {{$teacherhomeworkdetaild->homeworkdes}}</p>
            <br><br>
            <form method="post" action="{{route('student.uploadDocs')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group green-border-focus">
                <textarea class="form-control" name="descriptions" id="exampleFormControlTextarea5" required="true"
                  rows="6"></textarea>
              </div>
              <div class="row">
                <input type="hidden" name="Sub_id" value="{{$teacherhomeworkdetaild->subject_iid}}">
                <input type="hidden" name="lesson_id" value="{{$teacherhomeworkdetaild->lesson_id}}">
                <input type="hidden" name="date" value="{{$teacherhomeworkdetaild->date}}">
                <input type="hidden" name="tea_id" value="{{$teacherhomeworkdetaild->student_lessonsTeacherId}}">
                <div class="col-5">
                  <div class="form-group">
                    <input type="file" class="filestyle" required="true" name="img" data-icon="false"
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
@push('css')
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/teacher-homework-assign.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">
<style>
  p#exampleFormControlTextarea5 {
    border: 1px solid white;
    height: 200px;
    color: white;
  }
</style>
@endpush
