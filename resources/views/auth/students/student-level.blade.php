@extends('layouts.master')
@section('title','level')
@section('content')



<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/students-level.css')}}">

<section id="slider-part" class="slider-active">
    <div class="single-slider slider-4 bg_cover pt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont slider-cont-4 text-center">
                        <h1 data-animation="fadeInUp" data-delay="1s">REGISTER</h1>
                        <p data-animation="fadeInUp" data-delay="1.5s">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>
{{----}}
{{----}}

<section class="main-section">
    <div class="container">
        <div class="main-cont">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="form-parts">
                        <h3 class="level-heading">What level are you?</h3>
                        <form action="{{route('selectSubjects')}}" method="get">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <select name="level" class="selectpicker">
                                @foreach($level as $lvl)
                                <option value="{{$lvl->name}}">{{$lvl->name}}</option>
                                @endforeach
                            </select><br>
                            <div class="submit-button">
                                <button type="submit" class="btn btn-primary active" style="">Next</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-md-6 p-0">
                    <div class="d-flex align-items-center justify-content-center" id="submit-btn">
                        <img src="{{asset('asset/images/students/registration-banner.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection