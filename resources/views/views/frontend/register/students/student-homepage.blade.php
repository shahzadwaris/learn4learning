@extends('layouts.master')
@section('title','Student Homepage')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/student-homepage.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">

    
    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/student-lesson-search/banner.jpg')}}">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h3 class="std-welcome-msg">Hi Laura,<br>

                                Welcome back!</h3>
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

{{-- dashboard section --}}

<section class="dashboard-section">
    <div class="container">
        <div class="row d-flex justify-content-center text-center h-100">
            <div class="col-6" id="std-dashboard-left">
                <div class="stu-home-dash-head-div">
                    <p class="stu-home-dash-head-head">MY DASHBOARD</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset('asset/images/student-homepage/child.jpg')}}" alt="" id="stud-profile-pic">
                    </div>
                    <div class="col-8">
                        <p class="stud-name">Laura Smith</p>
                        <p class="stud-date">23/01/2012</p><br><br>
                        <a href="#" class="stu-fav-subj-link">My Favourite Subjects</a>
                        <p class="stu-fav-subj-list">Maths, Geography,English</p>
                        <p class="points-para">5000 points</p>
                    </div>
                </div>                
            </div>
            <div class="col-6"  id="std-dashboard-right">
                <div class="row">
                    <div class="col-6" id="achieve-div">
                        <img src="{{asset('asset/images/student-homepage/achievement.png')}}" alt="">
                        <p>MY<br>ACHIEVEMENTS</p>
                    </div>
                    <div class="col-6" id="schedule-div">
                        <img src="{{asset('asset/images/student-homepage/schedule.png')}}" alt="">
                        <p>MY<br>SCHEDULE</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6" id="grades-div">
                        <img src="{{asset('asset/images/student-homepage/grades.png')}}" alt="">
                        <p>MY<br>GRADES</p>
                    </div>
                    <div class="col-6" id="homework-div">
                        <img src="{{asset('asset/images/student-homepage/homework.png')}}" alt="">
                        <p>MY<br>HOMEWORK</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Carousel Wrapper-->
<section id="carousel-achieve">
    
    <div class="container">
            <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 5px;">MY ACHIEVEMENTS</h5>
            <hr>
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            
            <!--/.Controls-->
          
            <!--Indicators-->
            <ol class="carousel-indicators">
              <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
              <li data-target="#multi-item-example" data-slide-to="1"></li>
              <li data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->
          
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
          
              <!--First slide-->
              <div class="carousel-item active">
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
              </div>
              <!--/.First slide-->
          
              <!--Second slide-->
              <div class="carousel-item">
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
              </div>
              <!--/.Second slide-->
          
              <!--Third slide-->
              <div class="carousel-item">
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
                <div class="col-md-4">
                    <img class="card-img-top"
                    src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
                    alt="Card image cap">
                </div>
          
              </div>
              <!--/.Third slide-->
          
            </div>
            <!--/.Slides-->
          
          </div>
          <!--/.Carousel Wrapper-->
        
        
    </div>
</section>
{{-- end-dashboard section --}}


<section class="schedules">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        
                        <!-- Card content -->
                        <div class="card-body">
                    
                        <!-- Title -->
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">12/04</p>
                        <p class="card-text">18:00</p>
                            
                    
                        </div>
                    
                        <!-- Card footer -->
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <a href="#">VIEW LESSON</a>
                        </div>
                    
                    </div>
                </div>
                <div class="col-4">
                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        
                        <!-- Card content -->
                        <div class="card-body">
                    
                        <!-- Title -->
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">12/04</p>
                        <p class="card-text">18:00</p>
                            
                    
                        </div>
                    
                        <!-- Card footer -->
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <a href="#">VIEW LESSON</a>
                        </div>
                    
                    </div>
                </div>
                <div class="col-4">
                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        
                        <!-- Card content -->
                        <div class="card-body">
                    
                        <!-- Title -->
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">12/04</p>
                        <p class="card-text">18:00</p>
                            
                    
                        </div>
                    
                        <!-- Card footer -->
                        <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
                            <a href="#">VIEW LESSON</a>
                        </div>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <section id="about-part" class="about-tow pt-65">
        <div class="about-shape">
        </div>
        <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 5px;">Find A Lesson</h5>
         <!-- container -->
    </section>


    <section class="admission-row pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <form>

                    <div class="row">
                      <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Secondary Level</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                        </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Mathematics</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Date</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" style="background-color: #FDBF11;">SEARCH</a>
                      </div>
                    </div>

                </form>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    {{-- line break --}}
    


    {{-- documents section --}}


    <section id="filter-search-head" class="about-tow pt-65">
        <div class="about-shape">
        </div>
        <div class="container">
            <h5 style="text-align: left;color: #006796;font-size: 28px;letter-spacing: 5px;">Filter By</h5>
        </div>
        
         <!-- container -->
    </section>


    <section class="admission-row pb-120" id="filter-search-form" >
        <div class="container">
            <div class="row justify-content-center">
                <form>

                    <div class="row">
                      <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Secondary Level</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                        </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Mathematics</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <select class="selectpicker">
                            <optgroup label="Picnic">
                              <option>Date</option>
                              <option>Ketchup</option>
                              <option>Relish</option>
                            </optgroup>
                            <optgroup label="Camping">
                              <option>Tent</option>
                              <option>Flashlight</option>
                              <option>Toilet Paper</option>
                            </optgroup>
                          </select>

                      </div>

                      <div class="col-md-3"  style="padding: 18px;">
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" style="background-color: #FDBF11;">FILTER</a>
                      </div>
                    </div>

                </form>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(images/course/course-shape.png)"> <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(images/course/course-shape.png)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="level-heading-courses">SIMILAR LESSONS</h3>
                </div>         
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-1.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-1.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-2.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-2.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-3.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-3.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-4.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-4.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-5.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-5.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-2.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-2.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-2.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-2.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-2.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-2.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-lg-4">
                    <div class="single-course-2 mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="{{asset('asset/images/course/cu-2.jpg')}}" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                            <div class="course-teacher d-flex align-items-center">
                                <div class="thum">
                                    <a href="courses-single.html"><img src="{{asset('asset/images/course/teacher/t-2.jpg')}}" alt="teacher"></a>
                                </div>
                                <div class="teacher ml-10">
                                    <div class="name">
                                        <a href="#"><h6>Mark anthem</h6></a>
                                    </div>
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
                        <div class="cont">
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #818181;color: white;font-weight: 500;display: block;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO CALENDAR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div> <!-- single course -->
                </div>
                <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">VIEW MORE</a>
                </div>
            </div> <!-- course slide -->
        </div> <!-- container -->

        
    </section>



@endsection