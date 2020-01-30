@extends('layouts.app')
@section('content')
    <div class="container-fluid">
<div class="card">
    <div class="card-header">
      <b>Lenda:</b>{{ $gr->class->Name ?? ''}}  <b>Titulli:</b>   {{ $sur->SurveyTitle ?? '' }} <b>Profesori:</b> {{ $gr->Professor->Name ?? ''}} {{ $gr->Professor->LastName ?? ''}}  
        <b>Grupi:</b> {{$gr->Name ?? ''}}
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

</div>























@endsection