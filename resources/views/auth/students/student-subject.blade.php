@extends('layouts.teachersmaster')
@section('title','level')
@section('content')


<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/teachers-subjects.css')}}">
<link href="http://www.ansonika.com/potenza/css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/subjects-form-boxes.css')}}">
<style>
    footer {
        border-top: 1px solid #ededed;
        padding: 0px 0;
    }
</style>

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
    <form action="{{route('getSubjects')}}" method="post">
        @csrf
        <div class="container" style="width:80%">

            <div class="main-cont">

                <div class="row">
                    @if(session()->has('error_message_sec'))
                        <div class="alert alert-danger" style="color: #fff !important; text-transform:capitalize; background-color: #ffc10e !important; text-align: center;width:100%;">
                            {{session()->get('error_message_sec')}}
                        </div>
                    @endif
                    <div class="col-md">
                        <h3 class="level-heading">WHAT SUBJECTS DO YOU WANT TO STUDY?</h3>
                    </div>

                    @foreach($subjects as $key => $sub)
                    <div
                        class="col-md-6 d-flex align-items-center justify-content-center {{ $key%2==0 ? '_regSubLP': '_regSubRP' }}">
                        <div class="form-parts">
                            <div class="step">
                                <div class="form-group">
                                    <label class="container_check version_2">{{$sub['name']}}
                                        <input type="checkbox" name="subjects[]" value="{{$sub['id']}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div
                        class="col-lg-6 {{ count($subjects)%2 == 0 ? '_regSubLP': '_regSubRP' }} col-md-6 d-flex align-items-center justify-content-center">
                        <div class="col-md-12 d-flex align-items-center ">
                            <div class="form-parts">
                                <div class="step">
                                    <div class="form-group">
                                        <label class="container_check version_2">Other
                                            <input type="checkbox" name="subjects[]" value="00_other_id"
                                                data-toggle="collapse" data-target="#a00_other_id">
                                            <span class="checkmark"></span>
                                            <table id="lavel_table">
                                                <div id="a00_other_id" class="collapse">
                                                    <div class="field_wrapper add_top_20">
                                                        <div>
                                                            <input type="text" name="field[]"
                                                                placeholder="Other Subject" class="form-control"
                                                                style="position: relative;opacity: 1;cursor: revert;" />
                                                            <a href="javascript:void(0);"
                                                                class="add_button mt-3 mb-2 d-flex justify-content-end"
                                                                title="Add field"
                                                                style="color:black;text-decoration: underline;font-size: 15px">
                                                                {{-- <img style="height: 40px" src="{{asset('asset/images/flag/plus.png')}}"/>
                                                                --}}
                                                                ADD MORE
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </table>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="col-md-12 row" style="background-color: unset;box-shadow: none;margin-top: unset;margin-left: unset;padding-bottom: unset;position: unset;margin-right: unset !important;background: none;">

                        <div class="col-md-6 mt-4 _regSubLP" style="text-align: left">
                            <button type="submit" class="btn btn-primary active justify-content-center" style="align-content: center;">Register</button>
                        </div>
                        <div class="col-md-6"></div>
                    </div> --}}
                    <div class="col-lg-12 text-center ">
                        <div class="col-md-12 d-flex align-items-center justify-content-center p-0">
                            <div class="form-parts">
                                <div class="step">
                                    <button type="submit" class="btn btn-primary active justify-content-center"
                                        style="align-content: center;">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="user_id" value="{{$user_id}}">

            </div>
        </div>
    </form>
</section>

{{--    new form--}}

<script>
    function saveSubject(lever_id) {
            var subject = document.getElementById('subject');
            if(subject.value === ''){
                subject.setAttribute('style','border:1px solid red');
            }else{
                subject.removeAttribute('style');
                $.ajax({
                    type: 'get',
                    url  : '{{route("save-new-subject")}}',
                    data : {'subject':subject.value,'level_id':lever_id},
                    success: function (response) {
                        console.log(response)
                        if(response === 'true'){
                            location.reload();
                        }else{
                            alert('subject already saved');
                        }
                    } ,
                    error:function () {
                        alert('subject not saved');
                    }
                });
            }
        }
</script>

<script type="text/javascript">
    // <img style="height: 40px"src="{{asset("asset/images/flag/minus.png")}}"/></a>
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var x = 1;
    var fieldHTML = '<div><input type="text" placeholder="Other Subject" style="position: relative;opacity: 1;cursor: revert;" name="field[]" class="form-control" data-x = '+x+'  value=""/><a href="javascript:void(0);" class="remove_button mt-3 mb-2 d-flex justify-content-end" style="color:black;text-decoration: underline;font-size: 15px">DROP FIELD</div>'; //New input field html
     //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(e){
        //Check maximum number of input fields
        e.preventDefault();
        if(x < maxField ){
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection
