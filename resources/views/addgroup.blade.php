@extends('layouts.newapp')

@section('content')


<section class="query-container">
    <div class="query-info">
        <h3 class="query-title">Add New Group</h3>
        <form action="/Groups" method="post" class="query-form addprof-form">
            @csrf
             <input type="text"  name="Name1" value="{{ old('Name')}}" placeholder="Group Type (L,U)">
            <select class="select-style" name="Class_ID">
             <option value="" selected disabled>Choose Subject</option>
             @foreach ($classes as $class)
                               
             <option value="{{$class->id}}">{{$class->Name}}</option>

             @endforeach
         </select>
            <select class="select-style" name="Prof_ID" >
                <option value="" selected disabled>Choose Professor</option>
                @foreach ($Professors as $Prof)
                <option value="{{$Prof->id}}">{{$Prof->Name}} {{$Prof->LastName}}</option>
                @endforeach
            </select>
            <select class="select-style" name="Type" >
            <option value="" selected disabled>Choose Type</option>
            <option value="1">L</option>
            <option value="2">U</option>
            </select>    
            <input type="submit" value="Add">
        </form>
    </div>
    </section>


@endsection