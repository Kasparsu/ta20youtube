@extends('layout')

@section('content')
    <div class="card">
        <video src="{{$video->path}}" controls class="card-img-top" alt="..."></video>
        <div class="card-body">
            <h5 class="card-title">{{$video->title}}</h5>
            <p class="card-text">{{$video->description}}</p>
        </div>
        <div class="card-footer text-muted">
            {{$video->created_at->diffForHumans()}}
        </div>
    </div>

    @foreach($video->comments as $comment)
        <div class="card mt-2">
            <div class="card-body">
                <p class="card-text">{{$comment->body}}</p>
            </div>
            <div class="card-footer text-muted">
                {{$comment->user->name}}
                {{$comment->created_at->diffForHumans()}}
            </div>
        </div>
    @endforeach
@endsection
