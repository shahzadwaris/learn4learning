@extends('layouts.master')
<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->
@section('content')
<link rel="stylesheet" href="{{asset('asset/css/responsive/home-responsive.css')}}">
<style>
    .card-img-overlay {
        background-color: rgba(#000, 0.4);
    }

    .main-slider-btn2 {
        background-color: #ffc10e;
    }

    div#donate-register-btn-div {
        display: flex;
        padding-bottom: 3%;
        /* padding-top: 20px; */
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
    <div class="single-slider slider-4 bg_cover pt-150"
        style="background-repeat: no-repeat; background:linear-gradient(rgb(0 0 0 / 23%) 100%, rgba(0, 0, 0, 0.5) 100%), url({{asset('asset/images/slider/banner.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">@lang('welcome.BE_INSPITREDLEARN')</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">@lang('welcome.BE_INSPITREDLEARN_conternt')</p>
                        @if(!Auth::check())
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn"
                            href="{{ route('login') }}">@lang('welcome.I_A_STUDENT')</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2"
                            href="{{ route('login') }}" style="background-color: #036893;">
                            @lang('welcome.I_TEACHER')</a>
                        @endif
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->

<!--====== CATEGORY PART ENDS ======-->

<!--====== ABOUT PART START ======-->
<div class="" style="border-top: 1px solid white">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6" style="padding: 0px !important;">
            <!-- Card -->
            <div class="card card-image prim-second"
                style="background-image: url({{asset('asset/images/educations/primary.png')}}">

                <!-- Content -->
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">


                    <h3 class="card-title pt-2"><strong
                            style="color: white;line-height: 100px;font-size: 52px;font-weight: 500;">@lang('welcome.PRIMARY')</strong>
                    </h3>


                </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-lg-4 col-md-6" style="padding: 0px !important;">
            <!-- Card -->
            <div class="card card-image prim-second"
                style="background-image: url({{asset('asset/images/educations/secondary.png')}}">

                <!-- Content -->
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">


                    <h3 class="card-title pt-2"><strong
                            style="color: white;line-height: 100px;font-size: 52px;font-weight: 500;">@lang('welcome.SECONDARY')</strong>
                    </h3>


                </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-lg-4 col-md-12" style="padding: 0px !important;">
            <!-- Card -->
            <div class="card card-image prim-second"
                style="background-image: url({{asset('asset/images/educations/furthereducation.png')}}">

                <!-- Content -->
                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                    <h3 class="card-title pt-2"><strong
                            style="color: white;line-height: 50px;font-size: 52px;font-weight: 500;">@lang('welcome.FURTHER_EDUCATION')</strong>
                    </h3>
                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
</div>
<section id="about-part" class="about-tow pt-65">
    <div class="about-shape">
    </div>
    <h5 style="text-align: center;color: #006796;font-size: 28px;letter-spacing: 5px;">@lang('welcome.Find_A_Course')
    </h5>
    <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== ADMISSION PART START ======-->

<section class="admission-row pb-120">
    <div class="container">
        <div class="row justify-content-center">
            @if(session()->has('message.level'))

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! session('message.content') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form class="search_form" action="{{ route('searchSubForSubjectHome') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="level_id" required="true">
                            <optgroup label="Picnic">
                                <?php 
                                                                                        if(@$level){
                                                        $aray1=[];
                                                        $arraytypes=[];  ?>
                                <?php foreach (@$level as $key => $level) {
                                                        if(count($aray1)==0){
                                                        array_push($aray1,$level);
                                                        array_push($arraytypes,$level->name);

                                                        }else{
                                                            if(!in_array($level->name, $arraytypes)){
                                                            array_push($aray1,$level);
                                                            array_push($arraytypes,$level->name);
                                                            $cc=count($arraytypes);

                                                        }
                                                        }

                                                        
                                                        }
                                                        ?>


                                <option value="">@lang('welcome.Find_A_Course')</option>
                                @foreach($aray1 as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                                @endforeach

                                <?php      }       ?>
                            </optgroup>
                        </select>

                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="subject_id" required="true">
                            <optgroup label="Picnic">
                                <?php 
                                                         if(@$subjects){
                                                        $aray1=[];
                                                        $arraytypes=[];  ?>
                                <?php foreach (@$subjects as $key => $subjects) {
                                                        if(count($aray1)==0){
                                                        array_push($aray1,$subjects);
                                                        array_push($arraytypes,$subjects->name);

                                                        }else{
                                                            if(!in_array($subjects->name, $arraytypes)){
                                                            array_push($aray1,$subjects);
                                                            array_push($arraytypes,$subjects->name);
                                                            $cc=count($arraytypes);

                                                        }
                                                        }

                                                        
                                                        }
                                                        ?>

                                <option value="">Find Subjects</option>

                                @foreach($aray1 as $subjects)
                                <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                                @endforeach
                                <?php      }       ?>

                            </optgroup>
                        </select>

                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <select class="selectpicker" name="date_id" required="true">
                            <optgroup label="Picnic">
                                <option value="">Find Date</option>
                                <?php 
                                                         if(@$Date){
                                                        $aray1=[];
                                                        $arraytypes=[];  ?>
                                <?php foreach (@$Date as $key => $Date) {
                                                        if(count($aray1)==0){
                                                        array_push($aray1,$Date);
                                                        array_push($arraytypes,$Date->date);

                                                        }else{
                                                            if(!in_array($Date->date, $arraytypes)){
                                                            array_push($aray1,$Date);
                                                            array_push($arraytypes,$Date->date);
                                                            $cc=count($arraytypes);

                                                        }
                                                        }

                                                        
                                                        }
                                                        ?>
                                @foreach($aray1 as $Date)

                                <option value="{{$Date->id}}">{{$Date->date}}</option>
                                @endforeach

                                <?php      }       ?>

                            </optgroup>
                        </select>

                    </div>

                    <div class="col-md-3" style="padding: 18px;">
                        <button type="submit" class="main-slider-btn2 btn btn-warning" value=""
                            style="background-color: #FDBF11;color:white">SEARCH</button>
                    </div>
                </div>

            </form>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

{{-- broese by subject --}}
<section
    style="background:linear-gradient(rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5) 100%), url({{asset('asset/images/browsebysubject/browsebysubject.png')}}">
    <h5 style="text-align: center;color: #ffffff;font-size: 28px;letter-spacing: 5px;padding: 60px 0px 30px 0px;">
        @lang('welcome.browseBySubject')</h5>
    <div class="row justify-content-center" id="boxes-5">

        <div class="row icon_center" style="display: contents;">
            <div class="col-md-2.4" style="padding: 10px">
                <a href="#">
                    <span class="single-category text-center color-1">
                        <span class="icon">
                            <img src="{{asset('asset/images/browsebysubject/math.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>@lang('welcome.MATHS')</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>
            <div class="col-md-2.4" style="padding: 10px">
                <a href="#">
                    <span class="single-category text-center color-1">
                        <span class="icon">
                            <img src="{{asset('asset/images/browsebysubject/geography.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>@lang('welcome.GEOGRAPHY')</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>
            <div class="col-md-2.4" style="padding: 10px">
                <a href="#">
                    <span class="single-category text-center color-1">
                        <span class="icon">
                            <img src="{{asset('asset/images/browsebysubject/english.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>@lang('welcome.BIOLOGY')</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>
            <div class="col-md-2.4" style="padding: 10px">
                <a href="#">
                    <span class="single-category text-center color-1">
                        <span class="icon">
                            <img src="{{asset('asset/images/browsebysubject/biology.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>@lang('welcome.Browsecaall')</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>
            <div class="col-md-2.4" style="padding: 10px">
                <a href="#">
                    <span class="single-category text-center color-1">
                        <span class="icon">
                            <img src="{{asset('asset/images/browsebysubject/art.png')}}" alt="Icon">
                        </span>
                        <span class="cont">
                            <span>ART</span>
                        </span>
                    </span> <!-- single category -->
                </a>
            </div>

        </div>
    </div>

    <div style="text-align: center;padding: 60px 0px 60px 0px;">
        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#"
            style="background-color: #FDBF11;text-align: center;">BROWSE ALL</a>
    </div>
</section>

{{-- broese by subject --}}





<!--====== ADMISSION PART ENDS ======-->

<!--====== COURSE PART START ======-->
<section id="course-part" class="pt-115 pb-115 bg_cover gray-bg"
    style="background-image: url(images/course/course-shape.png)">
    <div class="container home-page-lessons">
        <div class="section-title pb-45">
            <h2>UPCOMING CLASSES</h2>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <!-- section title -->
            </div>
        </div> <!-- row -->


        @if (session('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('status') }}

        </div>

        @endif
        <div class="row">
            @foreach($getuserimg as $leson)

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 home-lessons-bot">
                <div class="single-course-2 mt-30">
                    <div class="row d-flex justify-content-center">
                        <div class="column d-flex justify-content-center">
                            <div class="price">
                                <img src="{{url('/storage/images/'.$leson->userthamnail)}}" class="course-profile-pic">
                            </div>
                        </div>
                    </div>
                    <div class="thum">

                        <div class="card">

                            <img src="{{url('/storage/images/'.$leson->thumbnail)}}" class="leasson-thumnail">
                            <div class="card-img-overlay text-white d-flex flex-column justify-content-center">

                                <h4 class="card-title subject-name">{{$leson->subjectname}}

                                </h4>
                                <h6 class="card-subtitle mb-2 subject-title">{{$leson->title}}</h6>
                                <div class="link d-flex">
                                </div>
                                <div class="row" id="rating-date-lesson">
                                    <div class="col-6">
                                        <h4 class="card-title lessone-date">{{$leson->date}}<br>
                                            {{$leson->time}}</h4>
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

                        @if(!Auth::check())

                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="{{ route('login') }}"
                            style="background: #818181;color: white;font-weight: 500;display: block;">I AM A
                            STUDENT/PARENT</a>

                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="{{route('login')}}"
                            style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO
                            CALENDAR</a>
                        @endif
                        @if(Auth::check())


                        <?php 
$authId=Auth::User()->id;

$getrecords=DB::table('users')->where('users.id', $authId)->where('users.type', 'student', 'users.id')->select('id', 'type')->get();
$getstu=count($getrecords);

if($getstu >=1){
 ?>




                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn"
                            href="{{ route('addToCalender', [$leson->lessonsId, $leson->teacher_id, $leson->subjects_id])}}"
                            style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO
                            CALENDAR</a>


                        <?php } else{ ?>


                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" href="#"
                            style="background: #818181;color: white;font-weight: 500;display: block;">LEARN MORE</a>
                        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn" onclick="Buttoncl();"
                            style="background: #7acdf0;color: white;font-weight: 500;display: block;">ADD TO
                            CALENDAR</a>


                        <?php  }  ?>
                        @endif
                    </div>
                </div> <!-- single course -->
            </div> <!-- single course -->
            @endforeach
        </div>


    </div> <!-- course slide -->

    <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
        <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE
            ALL</a>
    </div>
    </div> <!-- container -->
</section>




<style type="text/css">
    .thum img.card-img {
        margin-bottom: -76px;
        height: 472px;
    }
</style>


<script type="text/javascript">
    function Buttoncl(){
        alert('You have to register as a Student..');
    }
</script>

@endsection