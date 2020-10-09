@extends('layouts.master')
@section('title','level')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/student-lesson-page.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <section class="main-section">
        <div class="container">
           <div class="row">
               {{-- first-column --}}
               <div class="col-md-6 col-sm-12 col-xs-12">
                   <div class="row">
                       <div class="col-12 media">
                           <iframe width="420" height="345" src="https://www.youtube.com/embed/{{$lesssonDetail['0']['video']}}" allowfullscreen>
                           </iframe>
                       </div>
                   </div>
               </div>
               {{-- second-column --}}
               <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <h4>{{$lesssonDetail['0']['title']}}</h4>
                            <p>Live Date:{{$lesssonDetail['0']['date']}}<br>
                                Time:{{$lesssonDetail['0']['time']}}</p>
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{url('/storage/images/'.$lesssonDetail['0']['teacher_thumbnail'])}}">
                                </div>
                                <div class="col-md-5">
                                    <p>{{$lesssonDetail['0']['teacher_fname']}}-{{$lesssonDetail['0']['teacher_lname']}}</p>
                                </div>
                                <div class="col-md-5">
                                    <a href="{{route('teacherProfile',$lesssonDetail[0]['user_id'])}}" class="profile-btn" style="">VIEW PROFILE</a>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <img src="{{asset('asset/images/student-lesson-page/geography.jpg')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p data-animation="fadeInUp" data-delay="1.5s">{{$lesssonDetail['0']['description']}}</p>
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" id="addtocalen-btn">ADD TO CALENDAR</a>
                        </div>
                    </div>

               </div>

           </div>
        </div>
    </section>

    {{-- line break --}}
    <div class="container"><hr></div>


    {{-- documents section --}}

    <section class="documents-sec">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p style="font-weight: 700">Documents attached to the lesson</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">

                                <div class="col-6">
                                    Document2.pdf
                                </div>
                                <div class="col-6">
                                    <a href="#"><img src="{{asset('asset/images/student-lesson-page/lessson-download-pic.jpg')}}"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">

                                <div class="col-6">
                                    Document2.pdf
                                </div>
                                <div class="col-6">
                                    <a href="#"><img src="{{asset('asset/images/student-lesson-page/lessson-download-pic.jpg')}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="font-weight: 700">Documents attached to the lesson</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">

                                <div class="col-6">
                                    Document2.pdf
                                </div>
                                <div class="col-6">
                                    <a href="#"><img src="{{asset('asset/images/student-lesson-page/lessson-download-pic.jpg')}}"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">

                                <div class="col-6">
                                    Document2.pdf
                                </div>
                                <div class="col-6">
                                    <a href="#"><img src="{{asset('asset/images/student-lesson-page/lessson-download-pic.jpg')}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h3 class="level-heading">Ask a question</h3>
            <form action="" method="GET">
            <div class="row">
                <div class="col-12">
                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary active" >SEND</button>
                </div>
            </div>
            </form>
        </div>

    </section>


    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-6"><h5>User Reviews</h5></div>
                <div class="col-6"><h5>User Reviews</h5></div>
            </div>

            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                            <p class="text-secondary text-center">15 Minutes Ago</p>
                        </div>
                        <div class="col-md-10">
                            <p>
                                <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                           </p>
                           <div class="clearfix"></div>
                            <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>
                                <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
                                <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                           </p>
                        </div>
                    </div>
                        <div class="card card-inner">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                                        <p class="text-secondary text-center">15 Minutes Ago</p>
                                    </div>
                                    <div class="col-md-10">
                                        <p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a></p>
                                        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <p>
                                            <a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> Reply</a>
                                            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                                       </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
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
                <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">VIEW MORE</a>
                </div>
            </div> <!-- course slide -->
        </div> <!-- container -->
    </section>



@endsection
