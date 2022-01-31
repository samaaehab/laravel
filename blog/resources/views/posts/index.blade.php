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
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ date('d-m-Y', strtotime($post->created_at));}}</td>
                <td>
                     <form action="{{route('posts.destroy',$post->id)}}" method="POST">

                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-success">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-secondary">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-dark">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <span>
        {{$allPosts->(links())}}
    </span>
@endsection