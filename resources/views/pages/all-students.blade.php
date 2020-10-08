@extends('layouts.app', ['page' => __('Allstudents'), 'pageSlug' => 'allstudents'])


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Students Table</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Email</th>
                                    <th>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($data as $datum)
                                <form action="#" method="post">
                                        @csrf
                                        <tr>
                                            <td>{{$datum->id}}</td>
                                            <td>{{$datum->fname}}</td>
                                            <td>{{$datum->lname}}</td>
                                            <td>{{$datum->email}}</td>
                                            <td>

                                            </td>
                                        </tr>
                                                                                </form>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
