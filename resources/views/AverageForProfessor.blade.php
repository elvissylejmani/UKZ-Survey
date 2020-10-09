@extends('layouts.index')
@section('content')


<div class="card border-left-primary shadow mb-4">	
  <div class="card-header py-3">
    Fuzzy logic rating
</div>
<div class="card  shadow h-100 py-2 " style="width: 100%">
  <div class="card-body mx-auto">
    <div class="row no-gutters align-items-center">
      <div class="col mr-2">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Average using Fuzzy logic:</div>
      <div class="h5 mb-0 font-weight-bold text-gray-800"><h1>  <button class="btn btn-primary btn-circle btn-lg" style="height: 5.5rem; width: 5.5rem"> @if ($FuzzyAverage > 5) 5 
        @elseif($FuzzyAverage < 1) 1
          @else
       {{round($FuzzyAverage,2) ?? 0}}
      
       @endif
      </button>   </h1></div>
      </div>
      <div class="col-auto">
      </div>
    </div>
  </div>
</div>
</div>

  <div class="card shadow border-left-primary mb-4">	
    <div class="card-header py-3">
        Sets
  </div>
  <table class="table table-borderless">
    <thead>
      <tr>
    <th scope="col">   <a href="/Professor/{{$professor->id}}/Survey" class="@if(app('request')->input('set') == null) active @else '' @endif">Overall Rating</a></th>
        <th scope="col"> <a href="/Professor/{{$professor->id}}/Survey?set=5" class="@if(app('request')->input('set') == 5) active @else '' @endif">Excellent</a></th>
        <th scope="col">     <a href="/Professor/{{$professor->id}}/Survey?set=4" class="@if(app('request')->input('set') == 4) active @else '' @endif">Very Good</a></th>
        <th scope="col">     <a href="/Professor/{{$professor->id}}/Survey?set=3" class="@if(app('request')->input('set') == 3) active @else '' @endif">Good</a></th>
        <th scope="col">     <a href="/Professor/{{$professor->id}}/Survey?set=2" class="@if(app('request')->input('set') == 2) active @else '' @endif">Weak</a></th>
        <th scope="col"><a href="/Professor/{{$professor->id}}/Survey?set=1" class="@if(app('request')->input('set') == 1) active @else '' @endif">Very Weak</a></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: center" colspan="3">
          <div class="mt-4"></div>       
            Students
          <h1>    <button class="btn btn-primary btn-circle btn-lg" style="height: 5.5rem; width: 5.5rem"> @if(app('request')->input('set') != null){{ $professor->FuzzyRating->where('StudentSet',app('request')->input('set'))->count()  }}
            @else   {{ count($professor->FuzzyRating->all()) }} @endif </button></h1>
        </td>
          <td style="text-align: center" colspan="2">
            <div class="mt-4"></div>   
            Average
          
            <h1>  <button class="btn btn-primary btn-circle btn-lg" style="height: 5.5rem; width: 5.5rem"> {{round($AnswersRating,2) ?? 0}} </button>   </h1>
            
            {{-- Average<h1>{{$AnswersRating ?? 0}} </h1></td> --}}
        </tr>
    </tbody>
  </table>
  </div>



{{-- <section class="content-container-prof-rating">
    <div class="prof-rating-area">
 <article class="single-prof-rating"> --}}
     {{-- <div class="prof-img">
    <img src="img/professors/Artan.jpg" alt=""> 
 </div> --}}
 {{-- <div class="prof-info">
     <h3>Professor:<span>{{$professor->Name ?? ''}} {{$professor->LastName ?? ''}}</span></h3>
 </div>
 </article>
</div> --}}
{{-- <div class="filter-by-set">
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
</div> --}}

@foreach ($surveys as $survey)
@php
$gr = $survey->Group;
@endphp
<div class="card shadow mb-4  border-left-primary shadow-lg ">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Subject: <span>{{$gr->class->Name}}</span> Group: <span>{{$gr->Name}}</span> Title: <span>{{$survey->SurveyTitle}}</span></span>
      Group: <span>{{$gr->Name}}</h5>
  </div>
  <div class="card-body">
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
    <h4>Question: <span>{{$question->question}}:</span></h4>

                  @if (app('request')->input('set') != null)
                  @foreach ($question->Answers->where('StudentSet',app('request')->input('set')) as $ans)
                  <h4 class="btn btn-info btn-circle">  {{$ans->Answer}} </h4>
                  @php
                  $SurveyTemp += $ans->Answer;
                  $countTemp++;
                  @endphp
                  @endforeach
                  @else
                  @foreach ($question->Answers as $ans)
                  <h4 class="btn btn-info btn-circle">  {{$ans->Answer}} </h4>
                  @php
                  $SurveyTemp += $ans->Answer;
                  $countTemp++;
                  @endphp
                  @endforeach
                  @endif
                 
                  @endforeach

                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rating</div>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">@if($countTemp != 0) {{round($SurveyTemp/$countTemp,2) }} @php
                                  $avg = $SurveyTemp/$countTemp;
                              @endphp @else @php
                                  $avg = 0;
                              @endphp 0 @endif</div>
                            </div>
                            <div class="col">
                              <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: {{ isset($avg) ? $avg * 20 : '0' }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
              @php
                  unset($avg);
              @endphp
                  @endforeach



  {{-- <div class="completed-surveys">
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
</section> --}}




















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