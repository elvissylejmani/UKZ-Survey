@extends('layouts.index')

@section('content')





<div class="row">
    @foreach ($surveys as $survey)

    @php
        $gr = $survey->Group;
    @endphp

<div class="col-md-6">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Title:<span>{{ $survey->SurveyTitle ?? ''}}</h6>
    </div>
    <div class="card-body">
        <h4 class="survey-subject"></span></h4>
        <h4 class="survey-subject">Group:<span>{{$gr->Name}}</span></h4>
        <h4 class="survey-subject">Subject:<span> {{$gr->Class->Name}}</span></h4>
       <h4 class="survey-subject">Professor:<span> {{$gr->Professor->Name ?? ''}} {{$gr->Professor->LastName ?? ''}}</span></h4>
    </div>
    <div class="row">
    <div class="col-3 ml-2 mb-2  ">
    <a href="/Survey/{{$survey->id}}" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-check"></i>
        </span>
        <span class="text">Modify</span>
      </a>
    </div>
    <div class="col-5  ">
    <a href="/Answer/{{$survey->id}}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-check"></i>
        </span>
        <span class="text">View Results</span>
      </a>
    </div>
    <div class="col-3  ">
        <form action="/Survey/{{$survey->id}}" method="POST">
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




    {{-- <article class="single-survey">
     <h3 class="survey-subject">Subject:<span>{{$gr->Class->Name}}</span></h3>
     <h3 class="survey-subject">Gr:<span>{{$gr->Name}}</span></h3>
     <h4 class="survey-professor">Professor:<span>{{$gr->Professor->Name ?? ''}} {{$gr->Professor->LastName ?? ''}}</span></h4>
     <div class="survey-action">
     <a href="/Survey/{{$survey->id}}" class="survey-modify">Modify</a>
     <a href="/Answer/{{$survey->id}}" class="survey-view">View Results</a>
    </div>
    <form action="/Survey/{{$survey->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-survey" title="Delete Survey"><i class="fas fa-times"></i></button>  
    </form>

    </article> --}}
    @php
        unset($gr);
    @endphp
    @endforeach
</div>
      


@endsection