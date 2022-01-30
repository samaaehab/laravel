@extends('layout.app') 
@section('title') Edit @endsection

@section('content') 
<form method="POST" action="{{route('posts.update')}}">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
    </div>
            
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>  
    </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control">
                <option value="1">ahmed</option>
                <option value="2">mohamed</option>
            </select>
        </div>
            
        <button class="btn btn-dark">Create Post</button>
</form>

@endsection
