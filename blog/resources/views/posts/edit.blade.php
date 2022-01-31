@extends('layout.app') 
@section('title') Edit @endsection

@section('content') 
<form method="POST" action="{{route('posts.update',$detail[0]->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $detail[0]->title }}">
    </div>
            
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea  name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $detail[0]->description }}
        </textarea>  
    </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select class="form-control">
            @foreach($detail as $post)
                <option value="{{ $post->id }}">{{ $post->user->name }}</option>
            @endforeach
            </select>
        </div>
            
        <button class="btn btn-dark">Create Post</button>
</form>

@endsection
