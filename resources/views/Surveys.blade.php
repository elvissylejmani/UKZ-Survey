@extends('layouts.index')

@section('content') 
    <div class="row">
    @foreach ($surveys as $survey)
    <div class="col-md-6">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Title:<span>{{ $survey->SurveyTitle ?? ''}}</h6>
        </div>
        <div class="card-body">
            <h4 class="survey-subject"></span></h4>
            <h4 class="survey-subject">Group:<span>{{ $survey->Name ?? ''}}</span></h4>
            <h4 class="survey-subject">Subject:<span>{{ $survey->Class_Name ?? ''}}</span></h4>
           <h4 class="survey-subject">Professor:<span>{{ $survey->Professor_Name ?? '' }} {{ $survey->Lastname ?? '' }}</span></h4>
        </div>
        <div class="col-6 mb-4 mx-auto">
        <a href="Question/{{$survey->id ?? ''}}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">Take Survey</span>
          </a>
        </div>
      </div>
    </div>
        {{-- <article class="single-survey">
         <h4 class="survey-subject"></span></h4>
         <h4 class="survey-subject">Group:<span>{{ $survey->Name ?? ''}}</span></h4>
         <h4 class="survey-subject">Subject:<span>{{ $survey->Class_Name ?? ''}}</span></h4>
        <h4 class="survey-subject">Professor:<span>{{ $survey->Professor_Name }} {{ $survey->Lastname }}</span></h4>
         <div class="survey-action">
         <a href="Question/{{$survey->id ?? ''}}" class="survey-modify">Take Survey</a>
        </div>
        </article> --}}
        @endforeach
</div>
@endsection