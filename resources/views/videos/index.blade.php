@extends('layout')
@section('content')
    @if(request()->session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="status-alert">
            {{request()->session()->get('status')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                        <a href="{{route('videos.edit', ['video' => $video])}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('videos.destroy', ['video' => $video])}}" class="btn btn-danger">Delete</a>
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

@push('scripts')
    <script>
        window.addEventListener("load", () => {
            const alert = bootstrap.Alert.getOrCreateInstance('#status-alert')
            setTimeout(() => alert.close(), 5000);
        });
    </script>
@endpush
