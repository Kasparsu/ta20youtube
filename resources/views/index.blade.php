@extends('layout')
@section('title', 'Home page')
@section('content')
    <h1>Hello Laravel</h1>
    <ul>
        @foreach($videos as $video)
            <li>
                {{$video->title}}
            </li>
        @endforeach
    </ul>
@endsection
