@extends('layouts.master')
<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->
@section('content')
<link rel="stylesheet" href="{{asset('asset/css/donate.css')}}">
    <style>
        .section-title h5::before {
            left: 12px;
        }

        .container{

        }

        .section-title .learn-line-yellow::before{
            background-color: #fff;
        }
    </style>
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
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/donate/banner.jpg')}}">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h1 data-animation="fadeInUp" data-delay="1s">We Do This Because We Care</h1>
                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>



    <!--====== SLIDER PART ENDS ======-->

    
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container" id="container">   
            <div class="section-title mt-50 d-flex justify-content-center">
                <h2>Donate Here</h2>
            </div> <!-- section title -->         
                <div class="row" id="row">
                    
                    <div class="col-lg-12" id="payment-radios">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
                            <label class="custom-control-label" for="defaultInline1">One-time ayment</label>
                          </div>
                          
                          <!-- Default inline 2-->
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
                            <label class="custom-control-label" for="defaultInline2">Monthly payment</label>
                          </div>
                    </div>                    
                    <div class="row" id="payment-pics">
                        <div class="col-md-4"><a href="#"><img src="{{asset('asset/images/donate/visa.jpg')}}"/><a></div>
                        <div class="col-md-4"><a href="#"><img src="{{asset('asset/images/donate/paypal.jpg')}}"/></a></div>
                    </div>
                     
                    <div class="">
                        
                        <div class="donation-para-div">
                            <p id="donation-para">How much do you want to donate:</p>
                        </div> <!-- teachers cont -->
                    </div>
                </div> <!-- row -->
                <div class="row" id="payment-btns">
                    <div class="col-md-2.4" style="padding: 10px">
                        <a href="#">
                            <a href="#" class = "donation-btns">£5</a>
                        </a>
                    </div>
                    <div class="col-md-2.4" style="padding: 10px">
                        <a href="#">
                            <a href="#" class = "donation-btns">£10</a>
                        </a>
                    </div>
                    <div class="col-md-2.4" style="padding: 10px">
                        <a href="#">
                            <a href="#" class = "donation-btns">£20</a>
                        </a>
                    </div>
                    <div class="col-md-2.4" style="padding: 10px">
                        <a href="#">
                            <a href="#" class = "donation-btns">£50</a>
                        </a>
                    </div>
                    <div class="col-md-2.4" style="padding: 10px">
                        <a href="#">
                            <a href="#" class = "donation-btns">Other</a>
                        </a>
                    </div>
                </div>  
                <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
           
            </div>
        </div> <!-- container -->
    </section>
    <!--====== CATEGORY PART START ======-->
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h2 class="donation-sec-heading">Don't be a cheap bastard</h2>
                        <h5></h5>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <img src="{{asset('asset/images/donate/cheap-bastard.jpg')}}" alt="">
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== CATEGORY PART ENDS ======-->
    
    
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">                  
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                                     
                </div>  
                <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                    <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">REGISTER</a>
                </div>              
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    
    <!--====== COURSE PART ENDS ======-->

    <section id="slider-part" class="slider-active">
        <div class="single-slider slider-4 bg_cover pt-150" style="background-repeat: no-repeat; padding-bottom: 150px; background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%), url({{asset('asset/images/slider/banner.jpg')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont slider-cont-4 text-center">
                            <h1 data-animation="fadeInUp" data-delay="1s">REGISTER</h1>
                            <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: white;color: black;font-weight: 500;">I AM A STUDENT/PARENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#" style="background: white;color: black;font-weight: 500;PADDING: 0PX 71PX;">I AM A TEACHER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>





@endsection
