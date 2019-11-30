@extends('layouts.app')

@section('content') 

<div class="container">
    <div class="row justify-content-center">
    @foreach ($surveys as $survey)
    <div class="col ">
                <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                        <ul class="navbar-nav auto">
                            </li class="nav-item">{{ $survey->id }}</li>
                            <li class="nav-item"><p class="h1">{{ $survey->SurveyTitle }} </p></li>
                                <a href="Question/{{$survey->id}}">  <button type="button" class="btn btn-secondary btn-lg">Plotso pyetsorin</button> </a>

                        </ul>
            </nav>  
            </div>
            @endforeach
        </div>
</div>
@endsection