@extends('layout')
@section('content')
    <a href="{{route('videos.create')}}" class="btn btn-primary">Add Video</a>
    {{$videos->links()}}
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{$video->id}}</td>
                <td>{{$video->title}}</td>
                <td>{{$video->duration}}</td>
                <td>{{$video->created_at}}</td>
                <td>{{$video->updated_at}}</td>
                <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <th>Id</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tfoot>
    </table>
    {{$videos->links()}}
@endsection
