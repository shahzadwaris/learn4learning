@extends('layouts.teachersmaster')
@section('title','Teacher Homepage')
@section('content')

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/teacher-homepage.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('asset/css/mdb.min-for-teacher-homepage.css')}}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();




            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);


                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }


            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                }
                else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

        });
    </script>

<!-- Card -->

{{-- dashboard section --}}

<section class="dashboard-section">
    <div class="container">
        <div class="row d-flex justify-content-center text-center h-100">
            <div class="col-4" id="std-dashboard-left">
                <div class="stu-home-dash-head-div">
                    <p class="stu-home-dash-head-head">MY Contact</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset('asset/images/student-homepage/child.jpg')}}" alt="" id="stud-profile-pic">
                    </div>
                    <div class="col-8">
                        <p class="stud-name">{{Auth::user()->fname}}-{{Auth::user()->lname}}</p>
                        <p class="stud-date">{{Auth::user()->description}}</p><br><br>
                        <p class="teacher-exper-head">EXPERIENCE</p>
                        <p class="stud-date ">
                           
</p><br><br>
                    </div>
                </div>
            </div>
            <div class="col-6"  id="std-dashboard-right">
         
            </div>
        </div>
    </div>
</section>


<!--Carousel Wrapper-->

{{-- end-dashboard section --}}


<section class="schedules">

        <div class="container">
                <h5 class="schedule-heading-teacher-homepage" >MY SCHEDULE</h5>
                <hr class="teacher-home-schedule-hr">
       
            <div class="row">
                        
              
          
                <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE ALL</a>
                </div>
            </div>
        </div>
    </section>

    <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(images/course/course-shape.png)"> <section id="course-part" class="pt-115 pb-115 bg_cover gray-bg" style="background-image: url(images/course/course-shape.png)">
            <div class="container">
                <div class="teacher-homework-dash-head-div">
                    <p class="teacher-homework-dash-head">MY HOMEWORK</p>
                    <hr>
                </div>
                <div class="row">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner">
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para-checked">SUBMITTED</span><i class="fa fa-check" id="tick-icon" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para-due">DUE 29/03</span></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="pad15">
                                    <div class="card">
                                        <img class="card-img" src="{{asset('asset/images/teacher-homepage/teacher-schedule-std-1.jpg')}}" alt="Bologna">
                                        <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                                            <div class="topright"><span class="exclamation-para">DUE TODAY</span><i class="fa fa-exclamation" aria-hidden="true" id="exclamation-icon"></i></div>
                                            <h6 class="card-subtitle mb-2">GEOGRAPHY</h6>
                                            <p class="card-subtitle mb-3">John Wick</p>
                                        </div>
                                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" id="schedule-btn-teach" href="#">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary leftLst"><</button>
                        <button class="btn btn-primary rightLst">></button>
                    </div>
                </div>
                <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE ALL</a>
                </div>
            </div>



        </section>




    @endsection
