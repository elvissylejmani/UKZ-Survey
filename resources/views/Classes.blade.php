@extends('layouts.app')


@section('content')


<div class="container">
    <form action="/Classes" method="post">

<div class="row mb-4">
    <div class="col"></div>
    <div class="col col-md-8">
            <nav class="navbar navbar-md navbar-light bg-white shadow-sm align-start border border rounded">
                    @csrf
                    <p class="h3 text-center ml-4"> Shto Lend</p>
                    <input type="text" name="Name" value="{{ old('Name')}}"  class="form-control mb-4 {{$errors->has('Name') ? 'border border-danger' : ''}}" placeholder="Emri i Lendes" aria-label="Username" aria-describedby="basic-addon1"> 
                    <button type="Submit" class="btn btn-primary">Shto</button>
                </nav>

    </div>
    <div class="col"></div>

</div>

</form>
</div>
@if ($Classes != null)


<div class="container-fluid">

    <div class="row">
@foreach ($Classes as $class)
    

        <div class="col col-md-6 mb-4">
    <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
        <form action="/Classes/{{$class->id}}" method="POST">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-danger"><i style=" " class="fas fa-times"></i></button>
    </form>
        <div class="col-md-5">
        <ul class="navbar-nav auto">

            <li class="nav-item"><p class="h3">Lenda:</p><p class="h1"> {{ $class->Name }} </p></li>
        </ul>
    </div>
        <div class="row">
            <div class="col">
                <p class="h3">Profesorat</p>
        <ul class="navbar-nav auto">
        @foreach ($class->Professors as $prof)
            <li class="nav-item"> {{$prof->Name}} {{$prof->LastName}} </li>
        @endforeach
        </ul>
    </div>
</div>
<div class="row">
<div class="col-sm">
<p class="h3">Grupet</p>
<ul class="navbar-nav auto">
@foreach ($class->Groups as $group)
    <li class="nav-item"> {{$group->Name}} </li>
@endforeach
</ul>
</div>

</div>
        <div class="" style="">
        <form action="/Classes/{{$class->id}}" method="GET">
            <button type="submit"  class="btn btn-success">Modifiko te dhenat e Lendes</button>
         </form>

        </div>
    </nav>
</div>
@endforeach
    </div>
</div>



@endif
@endsection