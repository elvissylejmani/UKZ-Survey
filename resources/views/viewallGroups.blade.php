@extends('layouts.newapp')

@section('content')
    
<section class="content-container">
    
    @foreach ($Groups as $Group)
    <article class="single-survey">
     <h3 class="survey-subject">Group:<span>{{ $Group->Name ?? ''}}</span></h3>
     <h3 class="survey-subject">Subject:<span>{{ $Group->Class->Name ?? '' }}</span></h3>
     <h3 class="survey-subject">Professor:<span>{{ $Group->Professor->Name ?? '' }} {{ $Group->Professor->LastName ?? '' }}</span></h3>
     <div class="survey-action">
     <a href="/Groups/1" class="survey-modify">View</a>
    </div>
     <a href="#" class="delete-survey" title="Delete Survey"><i class="fas fa-times"></i></a>  
    </article>
    
    @endforeach
   </section>




@endsection