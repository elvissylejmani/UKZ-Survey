@extends('layouts.newapp')
@section('content')





<section class="content-container-survey-result">
    <article class="single-survey-result">
        <div class="survey-result-head">
            <h3>Subject: <span>Algorithms And Data Structures</span> Professor: <span>Artan Dermaku</span> Survey Title: <span>Title</span>
             Group: <span>U2</span></h3>
        </div>
        <div class="survey-result-body">
           <div class="single-question-result">
               <h3>Question 1: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 1: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 1: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 1: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 1: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 1: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 1: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 13: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
           <div class="single-question-result">
               <h3>Question 13: Question Title</h3>
               <h4>Question Rating Value:5</h4>
           </div>
          
        </div>
        <div class="survey-result-footer">
            <div class="survey-result-footer-container">
            <h3>Rating: <span class="unrated">Unrated</span> Rated By: <span class="unrated"> 0</span></h3>
        </div>
            
        </div>
     
    </article>
    
   
   </section>















{{-- 
    <div class="container-fluid">
<div class="card">
    <div class="card-header">
      <b>Lenda:</b>{{ $gr->class->Name ?? ''}}  <b>Titulli:</b>   {{ $sur->SurveyTitle ?? '' }} <b>Profesori:</b> {{ $gr->Professor->Name ?? ''}} {{ $gr->Professor->LastName ?? ''}}  
        <b>Grupi:</b> {{$gr->Name ?? ''}}
    </div>
    <div class="card-body">
        @foreach ($questions as $question)
    <h5 class="card-title"><b>Pyeteja:</b> {{$question->question ?? '' }}</h5>
    @php
     $temp = 0;   
     $count = 0;
    @endphp
        @foreach ($question->Answers as $ans)
        <p class="card-text">{{$ans->Answer ?? ''}}</p>
            @php
                $temp += $ans->Answer;
                $count++;
            @endphp
        @endforeach
    <b>Mesatarja per ket pytje:</b>  
    @if ($count != 0)
    {{ $temp/$count ?? '' }}
    @endif
        @endforeach
      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    {{-- </div>
<div class="card-footer"><b> Mesatarja e komplet pyetesorit </b> {{ $avg }}</div>

  </div>

</div> --}} 




@endsection