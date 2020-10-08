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
                                <h4 class="card-title ">{{$page->title}}</h4>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <form action="{{route('pages.update', $page->id)}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" value="{{$page->title}}" name="title"
                                        id="title" placeholder="Page Title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="visibility">Visibility</label>
                                    <select name="visibility" class="form-control" id="visibility">
                                        <option value="0" {{$page->visibility ? 'selected' : ''}}>Private</option>
                                        <option value="1" {{$page->visibility ? 'selected' : ''}}>Public</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                {{-- <div id="summernote"></div> --}}
                                <textarea class="form-group" name="description" id="summernote" rows="10"
                                    style="min-width: 100%">
                                    {!!$page->page !!}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Page</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    .modal-content {
        background-color: black !important;
        color: white;
        opacity: 1;
    }
</style>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 4,
        height: 200
      });
</script>
@endsection