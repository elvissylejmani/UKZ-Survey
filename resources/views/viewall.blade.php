@extends('layouts.index')

@section('content')
<div class="row">
@foreach ($professors as $professor)
<div class="col-md-6">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Professor:</h6>
    </div>
    <div class="card-body">
        <h4 class="survey-subject"></span></h4>
        <h4 class="survey-subject"><span>{{$professor->Name}} {{$professor->LastName}}</span></h4>
        
    </div>
    <div class="row">
    <div class="col-2 ml-2 mb-2  ">
    <a href="/Professor/{{$professor->id}}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-check"></i>
        </span>
        <span class="text">Modify</span>
      </a>
    </div>
    <div class="col-7  ">
    <a href="/Professor/{{$professor->id}}/Survey" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-check"></i>
        </span>
        <span class="text">View Results</span>
      </a>
    <a href="/Professor/{{$professor->id}}/profile" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-check"></i>
        </span>
        <span class="text">View Profile</span>
      </a>
    </div>
    <div class="col-2  ">
        <form action="/Professor/{{$professor->id}}" method="POST">
            @csrf
        @method('DELETE')
    <button class="btn btn-danger btn-circle">
        <span class="icon text-white-50">
          <i class="fas fa-trash"></i>
        </span>
    </button>
        </form>
    </div>
</div>
  </div>
</div>
    @endforeach
</div>
{{-- <section class="content-container">
    @foreach ($professors as $professor)
    <article class="single-survey">
     <h3 class="survey-subject">Professor:<span>{{$professor->Name}} {{$professor->LastName}}</span></h3>
     <div class="survey-action">
     <a href="/Professor/{{$professor->id}}" class="survey-modify">Modify</a>
     <a href="/Professor/{{$professor->id}}/Survey" class="survey-view">View Rating</a>
    </div>
    <form action="/Professor/{{$professor->id}}" method="POST">
        @csrf
        @method('DELETE')
     <button class="delete-survey" title="Delete Professor"><i class="fas fa-times"></i></button>  
    </form>
    </article>
@endforeach --}}

@endsection