@extends('layouts.newapp')

@section('content')
    
<section class="content-container">
    @foreach ($professors as $professor)
    <article class="single-survey">
     <h3 class="survey-subject">Professor:<span>{{$professor->Name}} {{$professor->LastName}}</span></h3>
     <div class="survey-action">
     <a href="/Professor/{{$professor->id}}" class="survey-modify">Modify</a>
     <a href="/Professor/{{$professor->id}}/Survey" class="survey-view">View Rating</a>
    </div>
    <form action="/Professor/{{$professor->id}}" method="POST">
        @csrf
        @method('DELETE')
     <button class="delete-survey" title="Delete Professor"><i class="fas fa-times"></i></button>  
    </form>
    </article>
@endforeach

@endsection