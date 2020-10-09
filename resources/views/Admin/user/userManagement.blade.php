@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')



<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Teachers</h4>
                        </div>
                        <div class="col-4 text-right">

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userData as $data)
                                <tr>
                                    <td>{{$data->fname}}</td>
                                    <td>
                                        {{$data->email}}
                                    </td>
                                    <td>{{$data->country}}</td>
                                    <td>
                                        <?php 
                                        // dd($data);
                  switch ($data->role) {
                    case '0':?>
                                        <a onclick="myFunction()"
                                            href="<?php echo route('admin.Block',['id'=>$data->id])?>"
                                            class="btn btn-primary "> Active</a>
                                        <?php 
            break;
                case '1': 
                ?>
                                        <a onclick="myFunction()"
                                            href="<?php echo route('admin.Active',['id'=>$data->id])?>"
                                            class="btn btn-danger"> Block</a>
                                        <?php 
                      break;?>


                                        <?php      }
                ?>
                                    </td>



                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Student</h4>
                        </div>
                        <div class="col-4 text-right">

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentData as $data)
                                <tr>
                                    <td>{{$data->fname}}</td>
                                    <td>
                                        {{$data->email}}
                                    </td>
                                    <td>{{$data->country}}</td>
                                    <td>
                                        <?php 
                  
                  switch ($data->role) {
                    case '0':?>
                                        <a onclick="myFunction()"
                                            href="<?php echo route('admin.Block',['id'=>$data->id])?>"
                                            class="btn btn-primary "> Active</a>
                                        <?php 
            break;
                case '1': 
                ?>
                                        <a onclick="myFunction()"
                                            href="<?php echo route('admin.Active',['id'=>$data->id])?>"
                                            class="btn btn-danger"> Block</a>
                                        <?php 
                      break;?>


                                        <?php      }
                ?>
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>





        </div>
    </div>
    @endsection

    @push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
    @endpush





    <script>
        function myFunction() {
  var txt;
  var r = confirm("Are You Sure Are You Want to Edit");
  if (r == true) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
    </script>