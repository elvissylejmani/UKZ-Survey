@extends('layouts.newapp')
@section('content')





<section class="content-container">
    <article class="single-menu">
     <a href="/Groups/add/new">Add New Group<span><i class="fas fa-plus"></i></span></a>   
    </article>
    <article class="single-menu">
     <a href="/Groups/view/all">View All Groups<span><i class="fas fa-eye"></i></span></a>   
    </article>
   </section>









{{-- 
<div class="container">
    <form action="/Groups" method="post">

<div class="row mb-4">
    <div class="col"></div>
    <div class="col col-md-8">
            <nav class="navbar navbar-md navbar-light bg-white shadow-sm align-start border border rounded">
                    @csrf
                    <p class="h3 text-center ml-4">Shto grupin</p>
                    <input type="text" name="Name1" value="{{ old('Name')}}"  class="form-control mb-4 {{$errors->has('Name') ? 'border border-danger' : ''}}" placeholder="Lloji i grupit (L,U)" aria-label="Username" aria-describedby="basic-addon1"> 
                
                    <select class="custom-select mb-4" name="Class_ID" searchable="Search here.." required>
                        <option value="" disabled selected>shto lenden per kete grup</option>
                        @foreach ($classes as $class)
                               
                        <option value="{{$class->id}}">{{$class->Name}}</option>
        
                        @endforeach
                    </select>
                    <select class="custom-select mb-4" name="Prof_ID" searchable="Search here..">
                        <option value="" disabled selected>shto profesor per kete grup</option>
                        @foreach ($Professors as $Prof)
                        <option value="{{$Prof->id}}">{{$Prof->Name}} {{$Prof->LastName}}</option>
                        @endforeach
                    </select>
                    <button type="Submit" class="btn btn-primary">Shto</button>
                </nav>
    </div>
    <div class="col"></div>
</div>
</form>
</div>
@if ($Groups != null)


<div class="container-fluid">

    <div class="row">

        @foreach ($Groups as $Group)
        
        <div class="col col-md-6 mb-4">
            <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                <form action="/Groups/{{$Group->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger"><i style=" " class="fas fa-times"></i></button>
            </form>
            <div class="col-md-4">
                <ul class="navbar-nav auto">
        
                    <li class="nav-item"><p class="h3">Emri i Grupit:</p><p class="h1"> {{ $Group->Name }} </p></li>
                </ul>
            </div>
            <div class="col">
                   <p class="h3">Lenda:</p><p class="h2">  </p>
            </div>
            <form action="/Groups/{{$Group->id}}" method="GET">
                <button type="submit"  class="btn btn-success">Modifiko te dhenat e Lendes</button>
             </form>
            </nav>
        </div>
        

        @endforeach



@endif --}}









@endsection
