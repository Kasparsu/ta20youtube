@extends('layout')
@section('content')
    <form action="{{route('videos.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text"
                   class="form-control @error('title') is-invalid @enderror"
                   id="title"
                   name="title"
                   value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                name="description"
                rows="3">{{old('description')}}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="time" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{old('duration')}}">
            @error('duration')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="path" class="form-label">Video url</label>
            <input type="text" class="form-control @error('path') is-invalid @enderror" id="path" name="path" value="{{old('path')}}">
            @error('path')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="text" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" value="{{old('thumbnail')}}">
            @error('thumbnail')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Add video">
        </div>
    </form>
@endsection
