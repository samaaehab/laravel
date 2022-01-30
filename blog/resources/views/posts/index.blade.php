@extends('layout.app')

@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="btn btn-outline-success" type="submit">Create Post</a>
    </div>
        <br>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allPosts as $post)
            <tr>
                <th scope="row">1</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['posted_by'] }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>
                    <a href="/posts/{{$post['title']}}" class="btn btn-success">View</a>
                    <a href="{{route('posts.edit')}}" class="btn btn-secondary">Edit</a>
                    <a href="{{route('posts.destroy')}}" class="btn btn-dark">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection