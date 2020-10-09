@extends('layouts.teachersmaster')
@section('title','Teacher Profile')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/teacher-profile.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('asset/css/mdb.min-for-teacher-homepage.css')}}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
.form-edit-profiel input{
color: white;
}

</style>
    
    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/teacher-homepage/teaching_banner.jpg')}}">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">                        
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
            <div class="col-12" id="std-dashboard-left">
                <div class="stu-home-dash-head-div">
Edit Profile                    <hr>
                </div>
                <div class="row">
                  <div class="col-md-2">
                  </div>
                  <div class="col-md-8">
                <form action="{{route('edit.form.teacher.dashboard')}}" method="post">
                @csrf
  <div class="form-row form-edit-profiel">
    <div class="col-md-4 mb-3 md-form">
      <!-- <label for="validationDefault22">First name</label> -->
      <input type="text" class="form-control" name="fanmeedit"  id="validationDefault22" value="{{$editteacherProfile[0]->fname}}" required>
    </div>
    <div class="col-md-4 mb-3 md-form">
      <!-- <label for="validationDefault22">Last name</label> -->
      <input type="text" class="form-control" name="lnameedit" id="validationDefault22" value="{{$editteacherProfile[0]->lname}}" required>
    </div>
    <div class="col-md-4 mb-3 md-form">
      <!-- <label for="validationDefault22">Last name</label> -->
      <input type="text" class="form-control" name="counteyedit" id="validationDefault22" value="{{$editteacherProfile[0]->country}}" required>
    </div>

  </div>

  <div class="form-group">
    <div class="form-check pl-0">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck222" required>
      <label class="form-check-label" for="invalidCheck222">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <button type="submit" data-animation="fadeInUp" value="Submit" data-delay="2s" class="main-slider-btn2"  style="background-color: #FDBF11;">Edit Profile</button>
</form>
</div>

<div class="col-md-2">
</div>                    </div>
                </div>                
            </div>            
        </div>
    </div>
</section>


<!--Carousel Wrapper-->

{{-- end-dashboard section --}}



@endsection