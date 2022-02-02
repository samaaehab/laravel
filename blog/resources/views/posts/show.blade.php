@extends('layouts.app') 
@section('title') Show @endsection

@section('content') 
<div class="card" style="width: 18rem;">
  <div class="card-header">
    <h5>Post Info </h5>
  </div>
  <ul class="list-group list-group-flush">
  @foreach($post as $data)
    <li class="list-group-item">
        <span class="fw-bolder">Title:- </span><span> {{$data->title}}</span>
    </li>
    <li class="list-group-item">
        <span class="fw-bolder">Description:- </span><span>{{$data->description}}</span>    
    </li>
  @endforeach
  </ul>
</div>

<br>

<div class="card" style="width: 18rem;">
  <div class="card-header">
    <h5>Post Creator Info </h5>
  </div>
  <ul class="list-group list-group-flush">
  @foreach($post as $data)
    <li class="list-group-item">
      <span class="fw-bolder">Name:- </span><span> {{$data->user->name}}</span>
    </li>
    <li class="list-group-item">
        <span class="fw-bolder"> Email:- </span><span> {{$data->user->email}}</span>    
    </li>
    <li class="list-group-item">
        <span class="fw-bolder">Created At:- </span><span> {{$data->created_at}}</span>    
    </li>
  @endforeach
  </ul>
</div>
@endsection
