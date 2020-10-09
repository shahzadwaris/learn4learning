@extends('layouts.teachersmaster')
@section('title','Student Homework')
@section('content')

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
          <p class="stu-home-dash-head-head">View HOMEWORK</p>
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
            <p class="stud-date"><b>Subject</b> {{$teacherhomeworkdetaild->subjectsName}}</p><br>
            <p class="stud-date"><b>Title:</b> {{$teacherhomeworkdetaild->title}}</p><br>
            <p class="stud-date"><b>Title:</b> {{$teacherhomeworkdetaild->fname}}</p><br>

            <form action="{{route('teacher.addHomework')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group green-border-focus readmore">
                <h3 style="color:white">Detail</h3>
                <p id="exampleFormControlTextarea5" rows="6"> {{$teacherhomeworkdetaild->discription}}" </p>
              </div>
              <div class="row">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="admission-row pb-120" id="std-homework-table-sec">
  <div class="container">
    <div class="row justify-content-center">
      <p class="grade-homework-tab-head">Assign Grade</p>
      <hr class="grade-homework-tab-hr">
      <div class="table-responsive table-home-assign">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="table-heading">Name</th>
              <th scope="col" class="table-heading">SUBJECT</th>
              <th scope="col"></th>
              <th scope="col" class="table-heading">PICK A GRADE</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"> {{$teacherhomeworkdetaild->fname}}</th>
              <td>{{$teacherhomeworkdetaild->subjectsName}}</td>
              <!-- <td><button type="button" class="btn btn-indigo btn-sm m-0" id="upload-work-btn">UPLOAD HOMEWORK</button></td> -->
              <form action="{{route('Assign_Acivement')}}" method="post" enctype="multipart/form-data">
                @csrf
                <td>
                  <input type="hidden" class="form-control" name="sub_id" value="{{$sub_id}}">
                  <input type="hidden" class="form-control" name="usrersid" value="{{$User_id}}">

                  <input type="hidden" class="form-control" name="homeworkid" value="{{$homeworkid}}">

                  <input type="text" class="form-control" name="grade" value="{{$grade ? $grade->grade : ''}}"
                    placeholder="Enter Grade" required="true">

                </td>

                <td>
                  <input type="file" name="photo" class="form-control" accept="image/x-png,image/gif,image/jpeg">
                </td>

                <td><button type="submit" class="btn btn-indigo btn-sm m-0" id="view-lesson-btn">SAVE</button></td>
            </tr>
            </form>

          </tbody>
        </table>
      </div>
    </div> <!-- row -->
    <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
    </div>
  </div> <!-- container -->
</section>
@endsection