@extends('layout')
@section('content')
    <form action="{{route('videos.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="time" class="form-control" id="duration" name="duration">
        </div>
        <div class="mb-3">
            <label for="path" class="form-label">Video url</label>
            <input type="text" class="form-control" id="path" name="path">
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="text" class="form-control" id="thumbnail" name="thumbnail">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Add video">
        </div>
    </form>
@endsection
