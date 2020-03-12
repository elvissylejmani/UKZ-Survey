@extends('layouts.newapp')
@section('content')


<section class="content-container-prof-rating">
    <div class="prof-rating-area">
 <article class="single-prof-rating">
     {{-- <div class="prof-img">
    <img src="img/professors/Artan.jpg" alt=""> 
 </div> --}}
 <div class="prof-info">
     <h3>Professor:<span>Artan Dermaku</span></h3>
     <h3>Overall Average Rating:4.5</h3>
 </div>
 </article>
</div>
  <div class="completed-surveys">
      <h3>Completed Surveys</h3>
      <div class="completed-surveys-container">
      <article class="single-completed-survey">
          <div class="single-completed-survey-head">
              <h4>Subject: <span>Algorithms and Data Structures</span> Group: <span>U1</span> Title: <span>Test 1</span></h4>
          </div>
          <div class="single-completed-survey-body">
              <div class="single-question">
                  <h4>Question: <span>Question 1</span></h4>
                  <h4>Rated with: 5</h4>
              </div>
              <div class="single-question">
                  <h4>Question: <span>Question 1</span></h4>
                  <h4>Rated with: 5</h4>
              </div>
              <div class="single-question">
                  <h4>Question: <span>Question 1</span></h4>
                  <h4>Rated with: 5</h4>
              </div>
              <div class="single-question">
                  <h4>Question: <span>Question 1</span></h4>
                  <h4>Rated with: 4</h4>
              </div>
          </div>
          <div class="single-completed-survey-footer">
               <h4>Average rating on this survey: 4.6</h4>
          </div>
      </article>
      <article class="single-completed-survey">
          <div class="single-completed-survey-head">
              <h4>Subject: <span>Algorithms and Data Structures</span> Group: <span>U1</span> Title: <span>Test 1</span></h4>
          </div>
          <div class="single-completed-survey-body">
              <div class="single-question">
                  <h4>Question: <span>Question 1</span></h4>
                  <h4>Rated with: 5</h4>
              </div>
              <div class="single-question">
                  <h4>Question: <span>Question 1</span></h4>
                  <h4>Rated with: 5</h4>
              </div>
              <div class="single-question">
                  <h4>Question: <span>Question 1</span></h4>
                  <h4>Rated with: 5</h4>
              </div>
          </div>
          <div class="single-completed-survey-footer">
               <h4>Average rating on this survey: 4.6</h4>
          </div>
      </article>
  </div>
 </div>
</section>




















{{-- 
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header bg-primary">
            <b>Profesori</b> {{$professor->Name ?? ''}} {{$professor->LastName ?? ''}}
        </div>

            <div class="card-body">
                <b>Mesatarja e pergjithshme e profesorit:</b> {{$avg ?? ''}}

            </div>
            @if ($avg != 0)
            <div class="card-footer bg-info"><b> Me posht gjeni te dhenat se si jeni votuar nga studentet</div>
            @else
            <div class="card-footer bg-warning"><b>Nuk jeni vlersuar ende</div>
            @endif
    </div>

@foreach ($surveys as $survey)
    
    <div class="card mb-4">
        <div class="card-header bg-primary">
            @php
                  $gr = $survey->Group;
              @endphp
              <b>Lenda:</b> {{$gr->Class->Name}} @php
                  unset($gr);
              @endphp
           <b>Groupi</b> {{$survey->Group->Name}} 
           <b> Titulli :</b>  {{ $survey->SurveyTitle }} 
        </div>
        <div class="card-body">
            @php
                $SurveyTemp= 0;
                $countTemp = 0;
            @endphp
            @foreach ($survey->questions as $question)
            @php
            $temp = 0;   
            $count = 0;
           @endphp
               <h5 class="card-title"><b>Pyeteja:</b> {{$question->question ?? '' }}</h5>
               @foreach ($question->Answers as $ans)
               <p class="card-text">{{$ans->Answer ?? ''}}</p>
                   @php
                        $SurveyTemp += $ans->Answer;
                        $countTemp++;
                       $temp += $ans->Answer;
                       $count++;
                   @endphp
               @endforeach
           <b>Mesatarja per ket pytje:</b>  
           @if ($count != 0)
           {{ $temp/$count ?? '' }}
           @endif
           @endforeach
        </div>

           @if ($countTemp != 0)
           <div class="card-footer bg-success"><b> Mesatarja e pyetesorit </b> {{$SurveyTemp/$countTemp ?? ''}}</div>
           @else
           <div class="card-footer bg-warning"><b>Ky pytesor nuk eshte plotsuar nga as nje student </b></div>
           @endif

</div>



@endforeach


</div>
@endsection
 --}}
@endsection