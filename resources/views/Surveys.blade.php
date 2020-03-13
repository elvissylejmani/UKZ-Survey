@extends('layouts.newapp')

@section('content') 

    @foreach ($surveys as $survey)
    <section class="content-container">
        <article class="single-survey">
         <h3 class="survey-subject">Title:<span>{{ $survey->SurveyTitle ?? ''}}</span></h3>
         <h3 class="survey-subject">Subject:<span>{{ $survey->Group ?? ''}}</span></h3>
         <h4 class="survey-subject">Professor:<span>Artan Dermaku</span></h4>
         <div class="survey-action">
         <a href="Question/{{$survey->id ?? ''}}" class="survey-modify">Take Survey</a>
        </div>
        </article>
    </section>
            @endforeach

@endsection