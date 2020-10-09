@extends('layouts.teachersmaster')
@section('title','Student Homework')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/student-homework.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">


    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/student-lesson-search/banner.jpg')}}">
            <div class="container" >
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

<section class="admission-row pb-120" id="std-homework-find-lesson-sec">
    <div class="container">
        <div class="row justify-content-center">
            <form class="search_form" action="{{route('search_subjects_level')}}" method="post">
                   @csrf
                <div class="row">
                  <div class="col-md-3" style="padding: 18px;">
                    <select class="selectpicker" name="level_id">
                        <optgroup label="Picnic">

                      @foreach($Lessens as $Lessens)
                          <option value="{{$Lessens->Level_id}}">{{$Lessens->levelname}}</option>
                      @endforeach
                        </optgroup>
                
                    
                    </select>

                  </div>

                  <div class="col-md-3"  style="padding: 18px;">
                   <select class="selectpicker" name="sub_id">
                        <optgroup label="Picnic">
             
                      @foreach($level as $Lessens)
                          <option value="{{$Lessens->idd}}">{{$Lessens->sub_name}}</option>
                      @endforeach
                        </optgroup>
                
                    
                    </select>

                  </div>

                  <div class="col-md-3"  style="padding: 18px;">
                   <select class="selectpicker" name="date_id">
                        <optgroup label="Picnic">
                           
                      @foreach($date as $Lessens)
                          <option value="{{$Lessens->date}}">{{$Lessens->date}}</option>
                      @endforeach
                        </optgroup>
                
                    
                    </select>
                  </div>

                  <div class="col-md-3"  style="padding: 18px;">
                    <input type="submit" data-animation="fadeInUp" value="Submit" data-delay="2s" class="main-slider-btn2"  style="background-color: #FDBF11;">
                  </div>
                </div>

            </form>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


    <section class="admission-row pb-120" id="std-homework-table-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table">
      
                      <thead>
                        <tr>
                          <th scope="col" class="table-heading">SUBJECT</th>
                          <th scope="col" class="table-heading">TITLE</th>
                          <th scope="col" class="table-heading">DUE DATE</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                                      @foreach($Lessonss as $Lessens1)
                      <tbody>
                        <tr>
                          <th scope="row">{{$Lessens1->sub_name}}</th>
                          <td>{{$Lessens1->title}}</td>
                          <td>{{$Lessens1->date}}</td>
   
                          <td>
                          <a href="{{ route('ViewAchevment')}} ">
               <button type="button" class="btn btn-indigo btn-sm m-0" id="view-lesson-btn">VIEW HOMEWORk</button>
                        
                       </a>
                              </td>
                        </tr>
                       
              
                      </tbody>
                      @endforeach
                    </table>
                  </div>
            </div> <!-- row -->
           
        </div> <!-- container -->
    </section>

@endsection



