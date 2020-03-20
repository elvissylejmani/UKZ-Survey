@extends('layouts.newapp')

@section('content') 

<section class="content-container">
    @foreach ($surveys as $survey)
        <article class="single-survey">
         <h4 class="survey-subject">Title:<span>{{ $survey->SurveyTitle ?? ''}}</span></h4>
         <h4 class="survey-subject">Group:<span>{{ $survey->Name ?? ''}}</span></h4>
         <h4 class="survey-subject">Subject:<span>{{ $survey->Class_Name ?? ''}}</span></h4>
        <h4 class="survey-subject">Professor:<span>{{ $survey->Professor_Name }} {{ $survey->Lastname }}</span></h4>
         <div class="survey-action">
         <a href="Question/{{$survey->id ?? ''}}" class="survey-modify">Take Survey</a>
        </div>
        </article>
        @endforeach
    </section>

@endsection