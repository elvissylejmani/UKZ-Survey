@extends('layouts.index')
@section('content')

<div class="card shadow mb-4  border-left-primary shadow-lg ">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Subject: <span>{{$gr->class->Name}}</span> Professor: <span>{{$gr->Professor->Name}} {{$gr->Professor->LastName}}</span> Survey Title: <span>{{$sur->SurveyTitle}}</span>
        Group: <span>{{$gr->Name}}</h5>
    </div>
    <div class="card-body">
        @foreach ($questions as $question)
        <h3>Question: {{$question->question ?? ''}} :</h3>
        <h4>
        @foreach ($question->Answers as $ans)

       <h4 class="btn btn-info btn-circle">  {{$ans->Answer}} </h4>
         @endforeach
        </h4>


        @endforeach
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rating</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $avg }}</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: {{ $avg * 20}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>

    </div>
  </div>




{{-- 
<section class="content-container-survey-result">
    <article class="single-survey-result">
        <div class="survey-result-head">
            <h3>Subject: <span>{{$gr->class->Name}}</span> Professor: <span>{{$gr->Professor->Name}} {{$gr->Professor->LastName}}</span> Survey Title: <span>{{$sur->SurveyTitle}}</span>
             Group: <span>{{$gr->Name}}</span></h3>
        </div>
        <div class="survey-result-body">
            @foreach ($questions as $question) --}}
            {{-- @php
            $temp = 0;   
            $count = 0;
           @endphp --}}
            {{-- <div class="single-question-result">
                <h3>Question: {{$question->question ?? ''}} :</h3>
                @foreach ($question->Answers as $ans)
                <h4>{{$ans->Answer}}</h4> --}}
                {{-- @php
                $temp += $ans->Answer;
                $count++;
                @endphp --}}
                {{-- @endforeach --}}
                
                {{-- @if ($count != 0)
                    <h5>Question Rating:</h5>
                <h5>{{ $temp/$count ?? '' }}</h5>
                @endif --}}
            {{-- </div>
            @endforeach
          
          
        </div>
        <div class="survey-result-footer">
            <div class="survey-result-footer-container">
            <h3>Rating: <span class="unrated">{{ $avg }}</span></h3>
        </div>
            
        </div>
     
    </article>
    
   
   </section> --}}















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