@extends('layouts.app', ['page' => __('forparents'), 'pageSlug' => 'forparents'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">For Parents Posters</h5>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit</h4>
                            <p class="card-category"> click on text after changings save this</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($data as $datum)
                                        <form action="{{route('editforParents',[$datum->id])}}" method="post">
                                            @csrf
                                            <tr>
                                                <td>{{$datum->id}}</td>
                                                <td><input type="text" name="title" class="text-light" value="{{$datum->title}}" style="background-color:transparent; border: none"></td>
                                                <td><textarea name="discription" id="" cols="50" rows="10" class="w-100 text-light" style="background-color:transparent !important; border: none">{{$datum->discription}}</textarea> </td>
                                                <td>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">{{ __('save') }}</button>
                                                    </div>
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
