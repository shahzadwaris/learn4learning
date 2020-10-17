@extends('layouts.teachersmaster')
@section('title','level')
@section('js')
<script src="{{asset('asset/js/custom.js')}}"></script>
@endsection
@section('content')

<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="{{asset('asset/css/teachers-subjects.css')}}">
<link href="http://www.ansonika.com/potenza/css/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('asset/css/mdb.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/subjects-form-boxes.css')}}">

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
{{--    new form--}}



{{--    =====================================================--}}

<section class="main-section">
    <form action="{{route('teacherSubjects')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container customContaine" style="width:80%">

            <div class="main-cont">

                <div class="row">
                    <div class="col-md">
                        <h3 class="level-heading">WHAT SUBJECTS DO YOU WANT TO TEACH?</h3>
                    </div>

                    @foreach($subjects as $key => $sub_chunk)
                    <div class="col-lg-6 {{ $key+2%2==0 ? '_regSubLP': '_regSubRP' }}">
                        @foreach($sub_chunk as $key=>$sub)
                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                            <div class="form-parts">
                                <div class="step">
                                    <div class="form-group">
                                        <label class="container_check version_2">{{$sub['name']}}
                                            <input type="checkbox" name="subject[]" value="{{$sub['id']}}"
                                                data-toggle="collapse" data-target="#a{{$sub->id}}">
                                            <span class="checkmark"></span>
                                            <div id="lavel_table">
                                                <div id="a{{$sub->id}}" class="collapse">
                                                    <p><b>Select level(s) you want to teach</b></p>

                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label class="container_check version_2"
                                                                    style="border:unset!important;">Primary
                                                                    <input type="checkbox" checked
                                                                        name="subject_{{$sub['id']}}_level[]" value="1">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="container_check version_2"
                                                                    style="border:unset!important;">Secondary
                                                                    <input type="checkbox"
                                                                        name="subject_{{$sub['id']}}_level[]" value="2">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <label class="container_check version_2"
                                                                    style="border:unset!important;">Further Education
                                                                    <input type="checkbox"
                                                                        name="subject_{{$sub['id']}}_level[]" value="3">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </table>





                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    {{--  <div class="form-group col-md-6 d-flex align-items-center justify-content-center">
                        <div class="form-parts">
                            <label class="add_top_20">Other</label>
                            <div class="field_wrapper">
                                <div>
                                    <input type="text" name="field" class="form-control"  value=""/>
                                    <a href="javascript:void(0);" class="add_button"  title="Add field"><img style="height: 40px" src="{{asset('asset/images/flag/plus.png')}}"/></a>
                </div>
            </div>
        </div>
        </div> --}}
        <div class="col-lg-6 _regSubLP">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <div class="form-parts">
                    <div class="step">
                        <div class="form-group">
                            <label class="container_check version_2">Other
                                <input type="checkbox" name="subject[]" value="" data-toggle="collapse"
                                    data-target="#a00_other_id" id="other">
                                <span class="checkmark"></span>
                                <div id="others"></div>

                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>

        <div class="col-lg-6 _regSubLP">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <div class="form-parts">
                    <div class="step">
                        <button type="submit" class="btn btn-primary active justify-content-center"
                            style="align-content: center;">Register</button>
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
        </div>
        <input type="hidden" name="user_id" value="{{$user_id}}">

        </div>
        </div>
    </form>
</section>

{{--    new form--}}
<!-- Modal -->
@if(\Auth::user()->email_verified_at == '')
    <div id="myModal" style=" width: 100%;
    background: #5555;   display: flex;
    align-items: center;" class="modal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title alert alert-danger" style="width:100%;">Verifiy Email Address</h4>
          </div>
          <div class="modal-body">
            <p>Please First Verify Email Address.We Send You An Verification Email.</p>
          </div>
          <div class="modal-footer">
            <button onclick="resendEmail()" class="btn btn-success">Resend Email</button>
         </div>
        </div>
      </div>
    </div>
@endif
<script>
    function resendEmail(){

        let url = '{{ route('resendEmailAddress') }}';
        $.ajax({
            url:url,
            method:'GET',
            success: function(response) {
                console.log('response');
                console.log(response);
                alert(response.message);
            },
            error: function(error) {
                console.log('error');
                console.log(error);
            }
        });

    }

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
    $('#myModal').modal('show');
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false
    })
    // <img style="height: 40px"src="{{asset("asset/images/flag/minus.png")}}"/></a>
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" placeholder="Other Subject" style="position: relative;opacity: 1;cursor: revert;" name="field_name[]" class="form-control"  value=""/><a href="javascript:void(0);" class="remove_button mt-3 mb-2 d-flex justify-content-end" style="color:black;text-decoration: underline;font-size: 15px">DROP FIELD</div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
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