@extends('layouts.newapp')

@section('content')
<section class="content-container">
    <article class="single-survey">
     <h3 class="survey-subject">Subject:<span>Algorithms and Data Structures</span></h3>
     <h4 class="survey-professor">Professor:<span>Artan Dermaku</span></h4>
     <div class="survey-action">
     <a href="modifysurvey.html" class="survey-modify">Modify</a>
     <a href="viewsurveyresult.html" class="survey-view">View Results</a>
    </div>
     <a href="#" class="delete-survey" title="Delete Survey"><i class="fas fa-times"></i></a>  
    </article>
    
   
   </section>
      


@endsection