@extends('layouts.newapp')

@section('content')
    
<section class="content-container">
    <article class="single-survey">
     <h3 class="survey-subject">Professor:<span>Artan Dermaku</span></h3>
     <div class="survey-action">
     <a href="/Professor/1" class="survey-modify">Modify</a>
     <a href="/Professor/1/Survey" class="survey-view">View Rating</a>
    </div>
     <a href="#" class="delete-survey" title="Delete Survey"><i class="fas fa-times"></i></a>  
    </article>


@endsection