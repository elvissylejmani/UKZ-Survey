@extends('layouts.app')

@section('content')



<div class="container">
        <form action="/Survey" method="post">

    <div class="row mb-4">
        <div class="col"></div>
        <div class="col col-md-8">
                <nav class="navbar navbar-md navbar-light bg-white shadow-sm align-start border border rounded">
                        @csrf
                        <p class="h3 text-center ml-4"> Shto Pyetesor</p>
                        <input type="text" name="SurveyTitle" value="{{ old('SurveyTitle')}}"  class="form-control mb-4 {{$errors->has('SurveyTitle') ? 'border border-danger' : ''}}" placeholder="Titulli i Pyetesorit" aria-label="Username" aria-describedby="basic-addon1"> 
                        <button type="Submit" class="btn btn-primary">Shto</button>
                    </nav>

        </div>
        <div class="col"></div>

    </div>

</form>
</div>
<div class="container-fluid">
    <div class="row">
@foreach ($surveys as $survey)
<div class="col col-md-6 mb-4">
            <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                    <ul class="navbar-nav auto">
                        </li class="nav-item">{{ $survey->id }}</li>
                        <li class="nav-item"><p class="h1">{{ $survey->SurveyTitle }} </p></li>
                              <a href="/AddQuestions/{{$survey->id}}">  <button type="button" class="btn btn-secondary btn-lg">Shto Pyetje</button> </a>
                          <form action="/Question/{{$survey->id}}/edit">
                            <button type="submit" class="btn btn-info btn-lg"> Modifiko</button>
                        </form>
                    </ul>
        </nav>  
        </div>
        @endforeach
        </div>
    </div>
</div>

@endsection



