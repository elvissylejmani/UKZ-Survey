@extends('layouts.app')

@section('content')



<div class="container">
    <form action="/Professor" method="post">

<div class="row mb-4">
    <div class="col"></div>
    <div class="col col-md-8">
            <nav class="navbar navbar-md navbar-light bg-white shadow-sm align-start border border rounded">
                    @csrf
                    <p class="h3 text-center ml-4"> Shto Profesorin</p>
                    <input type="text" name="Name" value="{{ old('Name')}}"  class="form-control mb-4 {{$errors->has('Name') ? 'border border-danger' : ''}}" placeholder="Emri i profesorit" aria-label="Username" aria-describedby="basic-addon1"> 
                    <input type="text" name="LastName" value="{{ old('LastName')}}"  class="form-control mb-4 {{$errors->has('LastName') ? 'border border-danger' : ''}}" placeholder="Mbiemri i profesorit" aria-label="Username" aria-describedby="basic-addon1"> 
                    <button type="Submit" class="btn btn-primary">Shto</button>
                </nav>

    </div>
    <div class="col"></div>

</div>

</form>
</div>



<div class="container-fluid">
    <div class="row">
@foreach ($professors as $professor)
<div class="col col-md-6 mb-4">
            <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                   
                <ul class="navbar-nav auto">
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
                    </ul>
                    <div class="" style="posit">
                        <form action="Professor/{{$professor->id }}" method="GET">
                        <button type="submit"  class="btn btn-success">Modifiko te dhenat e profesorit</button>
                     </form>
                        <a href=" {{  route('Professor.delete', $professor->id) }}"onClick="return confirm('A jeni i sigurt se deshironi ta fshini te dhenen?')"><i style="float:right;margin-left:43vw; color:#FB0101; font-size:2em; " class="fas fa-times"></i></a>  
                        
                    </div> 
                        {{-- <a href="/AddQuestions/{{$professor->id}}">  <button type="button" class="btn btn-secondary btn-lg">Shto Pyetje</button> </a> --}}

        </nav>  
        </div>
        @endforeach
        </div>
    </div>
    
@endsection