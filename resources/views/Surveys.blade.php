@extends('layouts.newapp')

@section('content') 

    @foreach ($surveys as $survey)
    <section class="content-container">
        <article class="single-survey">
         <h4 class="survey-subject">Title:<span>{{ $survey->SurveyTitle ?? ''}}</span></h4>
         <h4 class="survey-subject">Group:<span>{{ $survey->Name ?? ''}}</span></h4>
         <h4 class="survey-subject">Subject:<span>{{ $survey->Class_Name ?? ''}}</span></h4>
        <h4 class="survey-subject">Professor:<span>{{ $survey->Professor_Name }}</span></h4>
         <div class="survey-action">
         <a href="Question/{{$survey->id ?? ''}}" class="survey-modify">Take Survey</a>
        </div>
        </article>
    </section>
            @endforeach

@endsection