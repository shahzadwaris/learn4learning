@extends('layouts.app', ['page' => __('Schedule'), 'pageSlug' => 'Schedule'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="card-title ">Pages</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-primary" href="{{route('pages.create')}}">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table">
                                <thead class=" text-primary">
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>visibility</th>
                                    <th>Action</th>

                                </thead>
                                <tbody>
                                    @if ($pages)
                                    @foreach($pages as $key => $page)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td width="20%">{{$page->title}}</td>
                                        <td width="50%">{{Str::limit($page->page, 150, '...')}}</td>

                                        <td>{{$page->visibility ? 'Public' : 'Private' }}</td>
                                        <td>
                                            <a href="{{route('pages.edit', $page->id)}}"
                                                class="btn btn-sm fa fa-edit"></a>
                                            <a href="{{route('pages.destroy', $page->id)}}"
                                                class="btn btn-sm fa fa-trash"></a>
                                            <a href="{{route('pages.show', $page->slug)}}"
                                                class="btn btn-sm fa fa-eye"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

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

@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection