@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
@foreach ($professors as $professor)
<div class="col col-md-6 mb-4">
            <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                    <ul class="navbar-nav auto">
                        </li class="nav-item">{{ $professor->id }}</li>
                        <li class="nav-item"><p class="h1">{{ $professor->Name }} </p></li>
                        <li class="nav-item"><p class="h1">{{ $professor->LastName }} </p></li>
                        @if ($professor->classes != null)
                            <p class="h2">Classes:</p>
                            <ol>
                        @foreach ($professor->classes as $class)
                        <li class="nav-item"><p class="h4">{{ $class->Name }} </p></li>
                        @endforeach
                    </ol>
                        @endif
                        
                        {{-- <a href="/AddQuestions/{{$professor->id}}">  <button type="button" class="btn btn-secondary btn-lg">Shto Pyetje</button> </a> --}}

                    </ul>
        </nav>  
        </div>
        @endforeach
        </div>
    </div>
    
@endsection