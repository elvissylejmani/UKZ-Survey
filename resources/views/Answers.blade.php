@extends('layouts.app')
@section('content')
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
    </div>
<div class="card-footer"><b> Mesatarja e komplet pyetesorit </b> {{ $avg }}</div>

  </div>

</div>























@endsection