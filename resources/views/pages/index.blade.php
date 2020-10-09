@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <h1>{{$title}}</h1>
        @if (count($services) > 0)
            <ul>
                @foreach ($services as $service)
                    <li>{{$service}}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
        
