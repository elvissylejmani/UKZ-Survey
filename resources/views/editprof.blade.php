@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <form action="/Professor/{{$professor->id}}" method="POST">
                @csrf
                @method('PATCH')
                <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
               <p class="h2">Modifiko profesorin</p>

                    <input type="text" name="Name" value="{{$professor->Name}}"  class="form-control mb-4 {{$errors->has('Name') ? 'border border-danger' : ''}}"  aria-label="Username" aria-describedby="basic-addon1"> 
                    <input type="text" name="LastName" value="{{$professor->LastName}}"  class="form-control mb-4 {{$errors->has('LastName') ? 'border border-danger' : ''}}" aria-label="Username" aria-describedby="basic-addon1"> 
                    <button type="Submit" class="btn btn-success">Modifiko</button>
                </nav>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
            
                <ul>
                @forelse ($professor->Classes as $Class)
                    <li> {{$Class->Name}} </li>
                    @empty
                    <p class="h2">Profesori nuk eshte i regjistruar ne as nje klase</p>
                @endforelse
            </ul>
            </nav>
        </div>
    </div>




</div>

@endsection