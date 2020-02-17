@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <b>Profesori</b> {{$professor->Name ?? ''}} {{$professor->LastName ?? ''}}
        </div>

            <div class="card-body">
                <b>Mesatarja e pergjithshme e profesorit:</b> {{$avg ?? ''}}

            </div>
            <div class="card-footer"><b> Me posht gjeni te dhenat se si jeni votuar nga studentet</div>
    </div>

@foreach ($surveys as $survey)
    
    <div class="card mb-4">
        <div class="card-header">
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
           <div class="card-footer"><b> Mesatarja e pyetesorit </b> {{$SurveyTemp/$countTemp ?? ''}}</div>
           @else
           <div class="card-footer"><b>Ky pytesor nuk eshte plotsuar nga as nje student </b></div>
           @endif

</div>



@endforeach


</div>


















@endsection

