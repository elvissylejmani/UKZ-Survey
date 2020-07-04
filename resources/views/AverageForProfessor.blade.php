@extends('layouts.index')
@section('content')



<div class="card shadow mb-4">	
    <div class="card-header py-3">	
      <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>	
    </div>	
    <div class="card-body">	
      <div class="chart-bar"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>	
        <canvas id="myBarChart" width="552" height="320" class="chartjs-render-monitor" style="display: block; width: 552px; height: 320px;"></canvas>	
      </div>	
      <hr>	
      Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.	
    </div>	
  </div>



<section class="content-container-prof-rating">
    <div class="prof-rating-area">
 <article class="single-prof-rating">
     {{-- <div class="prof-img">
    <img src="img/professors/Artan.jpg" alt=""> 
 </div> --}}
 <div class="prof-info">
     <h3>Professor:<span>{{$professor->Name ?? ''}} {{$professor->LastName ?? ''}}</span></h3>
 </div>
 </article>
</div>
<div class="filter-by-set">
  <section class="filter-by-set-sidebar" id="filter-by-set-sidebar"> 
     <a href="/Professor/{{$professor->id}}/Survey" class="@if(app('request')->input('set') == null) active @else '' @endif">Overall Rating</a>
     <a href="/Professor/{{$professor->id}}/Survey?set=5" class="@if(app('request')->input('set') == 5) active @else '' @endif">Excellent</a>
     <a href="/Professor/{{$professor->id}}/Survey?set=4" class="@if(app('request')->input('set') == 4) active @else '' @endif">Very Good</a>
     <a href="/Professor/{{$professor->id}}/Survey?set=3" class="@if(app('request')->input('set') == 3) active @else '' @endif">Good</a>
     <a href="/Professor/{{$professor->id}}/Survey?set=2" class="@if(app('request')->input('set') == 2) active @else '' @endif">Weak</a>
     <a href="/Professor/{{$professor->id}}/Survey?set=1" class="@if(app('request')->input('set') == 1) active @else '' @endif">Very Weak</a>
  </section>
  <section class="filter-by-set-ratings">
      <article class="filter-by-set-article">
          <h3>Students voted</h3>
      <h3>
          @if(app('request')->input('set') != null){{ $professor->FuzzyRating->where('StudentSet',app('request')->input('set'))->count()  }}
          @else   {{ count($professor->FuzzyRating->all()) }} @endif
        </h3>
      </article>
      <article class="filter-by-set-article">
          <h3>Average</h3>
          <h3>{{ $AnswersRating ?? 0  }}</h3>
      </article>
  </section>
</div>
  <div class="completed-surveys">
      <h3>Completed Surveys</h3>
      <div class="completed-surveys-container">
        @foreach ($surveys as $survey)
        @php
        $gr = $survey->Group;
       @endphp
        <article class="single-completed-survey">
          <div class="single-completed-survey-head">
              <h4>Subject: <span>{{$gr->class->Name}}</span> Group: <span>{{$gr->Name}}</span> Title: <span>{{$survey->SurveyTitle}}</span></h4>
          </div>
          @php
          unset($gr);
          $SurveyTemp= 0;
          $countTemp = 0;
          @endphp
           @foreach ($survey->questions as $question)
           @php
           $temp = 0;   
           $count = 0;
          @endphp
          <div class="single-completed-survey-body">
              <div class="single-question">
                  <h4>Question: <span>{{$question->question}}:</span></h4>
                  @if (app('request')->input('set') != null)
                  @foreach ($question->Answers->where('StudentSet',app('request')->input('set')) as $ans)
                  <h4>{{$ans->Answer}}</h4>
                  @php
                  $SurveyTemp += $ans->Answer;
                  $countTemp++;
                  @endphp
                  @endforeach
                  @else
                  @foreach ($question->Answers as $ans)
                  <h4>{{$ans->Answer}}</h4>
                  @php
                  $SurveyTemp += $ans->Answer;
                  $countTemp++;
                  @endphp
                  @endforeach
                  @endif
                 
                  @endforeach
                </div>
                <div class="single-completed-survey-head">
                <h4>Avreage for this survey: <span>@if($countTemp != 0) {{$SurveyTemp/$countTemp ?? ''}} @endif</span></h4>
              </div>
      </article>
   @endforeach
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
              <b>Lenda:</b> {{$gr->Class->Name}}
               @php
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
@section('script')
{{-- <script type="text/javascript" src="{{ URL::asset('js/filterrating.js') }}"></script> --}}
<script type="text/javascript" src="{{ URL::asset('admin/js/demo/chart-bar-demo.js') }}"></script>
@endsection