@extends('layouts.newapp')

@section('content')
<section class="content-container">
    @foreach ($surveys as $survey)
    @php
        $gr = $survey->Group;
    @endphp
    <article class="single-survey">
     <h3 class="survey-subject">Subject:<span>{{$gr->Class->Name}}</span></h3>
     <h3 class="survey-subject">Gr:<span>{{$gr->Name}}</span></h3>
     <h4 class="survey-professor">Professor:<span>{{$gr->Professor->Name ?? ''}} {{$gr->Professor->LastName ?? ''}}</span></h4>
     <div class="survey-action">
     <a href="/Survey/1" class="survey-modify">Modify</a>
     <a href="/Answer/{{$survey->id}}" class="survey-view">View Results</a>
    </div>
    <form action="/Survey/{{$survey->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-survey" title="Delete Survey"><i class="fas fa-times"></i></button>  
    </form>

    </article>
    @php
        unset($gr);
    @endphp
    @endforeach
   
   </section>
      


@endsection