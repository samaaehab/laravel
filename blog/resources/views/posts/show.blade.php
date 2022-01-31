@extends('layout.app') 
@section('title') Show @endsection

@section('content') 
<div class="card" style="width: 18rem;">
  <div class="card-header">
    <h5>Post Info </h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <span class="fw-bolder">Title:- </span><span> {{$detail[0]->title}}</span>
    </li>
    <li class="list-group-item">
        <span class="fw-bolder">Description:- </span><span>{{$detail[0]->description}}</span>    
    </li>
 
  </ul>
</div>

<br>

<div class="card" style="width: 18rem;">
  <div class="card-header">
    <h5>Post Creator Info </h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <span class="fw-bolder">Name:- </span><span> {{$detail[0]->user->name}}</span>
    </li>
    <li class="list-group-item">
        <span class="fw-bolder"> Email:- </span><span> {{$detail[0]->user->email}}</span>    
    </li>
    <li class="list-group-item">
        <span class="fw-bolder">Created At:- </span><span> {{$detail[0]->created_at}}</span>    
    </li>

  </ul>
</div>
@endsection
