@extends('layouts.master')
@section('title','level')
@section('content')
<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/students-level.css')}}">
<style>
    .customStyleBtn{
        background-color:#ffc10e !important;
        color:#fff;
        border-radius: 5px;
    }
    .alert-danger {
        color: #fff !important;
        background-color: #ffc10e !important;
        border-color: #ffc10e !important;
    }
    footer {
        border-top: 1px solid #ededed;
        padding: 0px 0;
    }
</style>
@php
    $emailVerified = \Auth::user()->email_verified_at;
    if(isset($verified)) {
        $emailVerified = isset($emailVerified) ? $emailVerified : $verified;
    } else {
        $emailVerified = $emailVerified;
    }
@endphp

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

<section class="main-section">
    <div class="container customContaine">
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
                <div class="col-md-6 p-0 responsiveHide">
                    <div class="d-flex align-items-center justify-content-center" id="submit-btn">
                        <img src="{{asset('asset/images/students/registration-banner.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
@if(!$emailVerified)
    <div id="myModal" style=" width: 100%;
    background: #5555;   display: flex;
    align-items: center;" class="modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title alert alert-danger" style="width:100%;">Verify Email Address</h4>
                </div>
                <div class="modal-body">
                    <p>Please First Verify Email Address.We Send You An Verification Email.Or You Can Change Your Email Address</p>
                    <div class="row">
                        <input type="email" class="form-control" placeholder="Enter Your Email..." name="email" id="emailAddress" value="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="resendEmail()" class="btn btn-success customStyleBtn">
                        <i class="fa fa-refresh fa-spin" id="fa-faSpin" style="display: none"></i>
                        Resend Email
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    function resendEmail(){
        let email = $('#emailAddress').val();
        email = email ? email : 'null';
        $('#fa-faSpin').show();
        let url = '/resend-email/'+email;
        $.ajax({
            url:url,
            method:'GET',
            success: function(response) {
                console.log('response');
                console.log(response);
                $('#fa-faSpin').hide();
                toastr.success('email resend successfully please check you email address..!');
            },
            error: function(error) {
                console.log('error');
                console.log(error);
                $('#fa-faSpin').hide();
            }
        });

    }

    $('#myModal').modal('show');
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false
    })
</script>

@endsection
