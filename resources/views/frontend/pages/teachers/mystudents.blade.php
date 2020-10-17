@extends('layouts.teachersmaster')
@section('title','Student Homework')
@section('content')
<style>
    @media( max-width: 991px)
    {
        #std-homework-find-lesson-sec{
            width: 100%;
        }
    }
</style>

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('asset/css/student-homework.css')}}">
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

    <section class="admission-row pb-120" id="std-homework-find-lesson-sec">
        <div class="container">
            <div class="row justify-content-center">
                <form class="search_form" action="{{route('searchstudents')}}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-3" style="padding: 18px;">
                            <select class="selectpicker" name="level">
                                <optgroup label="Picnic">
                                    <?php
                                    if(@$Level){
                                    $aray1=[];
                                    $arraytypes=[];  ?>
                                    <?php foreach (@$Level as $key => $Level) {
                                        if(count($aray1)==0){
                                            array_push($aray1,$Level);
                                            array_push($arraytypes,$Level->name);

                                        }else{
                                            if(!in_array($Level->name, $arraytypes)){
                                                array_push($aray1,$Level);
                                                array_push($arraytypes,$Level->name);
                                                $cc=count($arraytypes);

                                            }
                                        }


                                    }
                                    ?>

                                    <option value="">Find Level</option>

                                    @foreach($aray1 as $subjects)
                                        <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                                    @endforeach
                                    <?php      }       ?>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-md-3" style="padding: 18px;">
                            <select class="selectpicker" name="student">
                                <optgroup label="Picnic">
                                    <?php
                                    if(@$Students){
                                    $aray1=[];
                                    $arraytypes=[];  ?>
                                    <?php foreach (@$Students as $key => $Students) {
                                        if(count($aray1)==0){
                                            array_push($aray1,$Students);
                                            array_push($arraytypes,$Students->fname);

                                        }else{
                                            if(!in_array($Students->fname, $arraytypes)){
                                                array_push($aray1,$Students);
                                                array_push($arraytypes,$Students->fname);
                                                $cc=count($arraytypes);

                                            }
                                        }


                                    }
                                    ?>

                                    <option value="">Find Students</option>

                                    @foreach($aray1 as $subjects)
                                        <option value="{{$subjects->id}}">{{$subjects->fname}}</option>
                                    @endforeach
                                    <?php      }       ?>
                                </optgroup>
                            </select>

                        </div>

                        <div class="col-md-3" style="padding: 18px;">
                            <select class="selectpicker" name="subject_id">
                                <optgroup label="Picnic">
                                    <?php
                                    $DBsub=DB::table('subjects')->limit(5)->get();
                                    if(@$DBsub){
                                    $aray1=[];
                                    $arraytypes=[];  ?>
                                    <?php foreach (@$DBsub as $key => $DBsub) {
                                        if(count($aray1)==0){
                                            array_push($aray1,$DBsub);
                                            array_push($arraytypes,$DBsub->name);

                                        }else{
                                            if(!in_array($DBsub->name, $arraytypes)){
                                                array_push($aray1,$DBsub);
                                                array_push($arraytypes,$DBsub->name);
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
                            <input type="submit" data-animation="fadeInUp" value="Search" data-delay="2s" class="main-slider-btn2"
                                   style="background-color: #FDBF11; border:none;">
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
                            <th scope="col" class="table-heading">Name</th>
                            <th scope="col" class="table-heading">Level</th>
                            <th scope="col" class="table-heading">SUbject</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <?php
                        if(@$getmystydentrecord){
                        $aray1=[];
                        $arraytypes=[];  ?>
                        <?php foreach (@$getmystydentrecord as $key => $getmystydentrecord) {
                            if(count($aray1)==0){
                                array_push($aray1,$getmystydentrecord);
                                array_push($arraytypes,$getmystydentrecord->fname);

                            }else{
                                if(!in_array($getmystydentrecord->fname, $arraytypes)){
                                    array_push($aray1,$getmystydentrecord);
                                    array_push($arraytypes,$getmystydentrecord->fname);
                                    $cc=count($arraytypes);

                                }
                            }


                        }
                        ?>


                        @foreach($aray1 as $getmystydentrecord)
                            <tbody>
                            <tr>
                                <th scope="row">{{$getmystydentrecord->fname}}</th>
                                <td>{{$getmystydentrecord->level_name}}</td>
                                <td>{{$getmystydentrecord->Subject_name}}</td>


                                <td>
                                    <a href="{{route('View.student.profile', [$getmystydentrecord->user_id])}}">
                                        <button type="button" class="btn btn-indigo btn-sm m-0" id="view-lesson-btn">VIEW PROFILE</button>
                                </td>
                            </tr>


                            </tbody>
                        @endforeach

                        <?php } ?>
                    </table>
                </div>
            </div> <!-- row -->
            <div class="col-12 col-12 justify-content-center" id="donate-register-btn-div">
                <a data-animation="fadeInUp" data-delay="2s" class="main-slider-btn2" href="#" id="donate-register-btn">SEE
                    ALL</a>
            </div>
        </div> <!-- container -->
    </section>

@endsection
