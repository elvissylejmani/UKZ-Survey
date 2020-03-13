@extends('layouts.newapp')

@section('content')
<section class="content-container">
    @foreach ($surveys as $survey)
    <article class="single-survey">
     <h3 class="survey-subject">Subject:<span>Algorithms and Data Structures</span></h3>
     <h4 class="survey-professor">Professor:<span>Artan Dermaku</span></h4>
     <div class="survey-action">
     <a href="/Survey/1" class="survey-modify">Modify</a>
     <a href="/Answer/1" class="survey-view">View Results</a>
    </div>
     <a href="#" class="delete-survey" title="Delete Survey"><i class="fas fa-times"></i></a>  
    </article>
    @endforeach
   
   </section>
      


@endsection