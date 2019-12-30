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
            <form action="/Professor/{{$professor->id}}/edit" method="GET">
            <div class="input-group">
            <select class="custom-select" name="class" searchable="Search here.." required>
                <option value="" disabled selected>shto klasa per profesorin</option>
                @foreach ($classes as $class)
                   @if (!in_array($class->Name,$profclasses))
                       
                <option value="{{$class->id}}">{{$class->Name}}</option>
                @endif 

                @endforeach
            </select>
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">Shto</button>
            </div>
        </div>
        <input type="hidden" name="prof" value="{{$professor->id}}">
    </form>
        </nav>
            

        </div>
    </div>




</div>

@endsection
<script>
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>