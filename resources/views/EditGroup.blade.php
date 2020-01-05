@extends('layouts.app')
@section('content')
    


<div class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <form action="/Groups/{{$Group->id}}" method="POST">
                @csrf
                @method('PATCH')
                <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
               <p class="h2">Modifiko profesorin</p>

                    <input type="text" name="Name" value="{{$Group->Name}}"  class="form-control mb-4 {{$errors->has('Name') ? 'border border-danger' : ''}}"  aria-label="Username" aria-describedby="basic-addon1"> 
                   <p class="h2">{{$Group->Class->Name}} </p>
                   <select class="custom-select mb-4" name="Class_ID" searchable="Search here..">
                    <option value="" disabled selected>shto lenden per kete grup</option>
                    @foreach ($classes as $class)
                    @if (!($Group->Class->Name == $class->Name))
                    <option value="{{$class->id}}">{{$class->Name}}</option>
                    @endif
                    @endforeach
                </select>
                    <button type="Submit" class="btn btn-success">Modifiko</button>
                </nav>
            </form>
        </div>
        <div class="row ml-4">
            <div class="col-lg-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Profesoret</div>
                <div class="card-body">
                    @foreach ($Group->Class->Professors as $prof)
                <p class="card-text">{{$prof->Name}} {{$prof->LastName}}</p>
                    @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Studentet</div>
                    <div class="card-body">
                    @foreach ($Group->Students as $Stud)
                      <p class="card-text">{{$Stud->name}}</p>
                    @endforeach  
                    </div>
                  </div>
                </div>
        </div>
    </div>



















@endsection