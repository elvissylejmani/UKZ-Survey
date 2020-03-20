@extends('layouts.newapp')

@section('content')
    
<section class="content-container">
    
    @foreach ($Groups as $Group)
    <article class="single-survey">
     <h3 class="survey-subject">Group:<span>{{ $Group->Name ?? ''}}</span></h3>
     <h3 class="survey-subject">Subject:<span>{{ $Group->Class->Name ?? '' }}</span></h3>
     <h3 class="survey-subject">Professor:<span>{{ $Group->Professor->Name ?? '' }} {{ $Group->Professor->LastName ?? '' }}</span></h3>
     <div class="survey-action">
     <a href="/Groups/{{$Group->id}}" class="survey-modify">View</a>
    </div>
    <form action="/Groups/{{$Group->id}}" method="POST">
        @csrf
        @method('DELETE')
     <button class="delete-survey" title="Delete Group"><i class="fas fa-times"></i></button>  
    </form>
    </article>

    
    @endforeach
   </section>




@endsection