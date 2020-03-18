@extends('layouts.newapp')
@section('content')
<section class="content-container">

@foreach ($Classes as $class)
    
    <article class="single-survey">
     <h3 class="survey-subject">Subject:<span>{{$class->Name}}</span></h3>
     <div class="survey-action">
     <a href="/Classes/{{$class->id}}" class="survey-modify">Modify</a>
    </div>
     <a href="#" class="delete-survey" title="Delete Survey"><i class="fas fa-times"></i></a>  
    </article>
    
    @endforeach
   
   </section>



@endsection