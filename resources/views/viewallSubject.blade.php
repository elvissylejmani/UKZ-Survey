@extends('layouts.newapp')
@section('content')
<section class="content-container">

@foreach ($Classes as $class)
    
    <article class="single-survey">
     <h3 class="survey-subject">Subject:<span>{{$class->Name}}</span></h3>
     <div class="survey-action">
     <a href="/Classes/{{$class->id}}" class="survey-modify">Modify</a>
    </div>
    <form action="/Classes/{{$class->id}}" method="POST">
        @csrf
        @method('DELETE')
     <button class="delete-survey" title="Delete Subject"><i class="fas fa-times"></i></button>  
    </form>
    </article>
    
    @endforeach
   
   </section>



@endsection