@extends('layouts.index')

@section('content')


<div class="card shadow mb-4 border-left-primary">
      <div class="card-header py-3 mx-auto">
        <h3 class="m-0 font-weight-bold text-primary ">Add new Group</h3>
      </div>
      <div class="card-body">
        <form action="/Groups" method="post" class="query-form addprof-form">
            @csrf
        <input type="text" name="Name1" value="{{ old('Name')}}" placeholder="Group Type (L,U) & name" class="form-control mb-2"  >
        <select class="custom-select" id="inputGroupSelect01" name="Class_ID">
            <option value="" selected disabled>Choose Subject</option>
            @foreach ($classes as $class)
                              
            <option value="{{$class->id}}">{{$class->Name}}</option>

            @endforeach
        </select>

        <select class="custom-select mt-2" id="inputGroupSelect01" name="Prof_ID" >
            <option value="" selected disabled>Choose Professor</option>
            @foreach ($Professors as $Prof)
            <option value="{{$Prof->id}}">{{$Prof->Name}} {{$Prof->LastName}}</option>
            @endforeach
        </select>
        <select class="custom-select mt-2" id="inputGroupSelect01" name="Type" >
            <option value="" selected disabled>Choose Type</option>
            <option value="1">L</option>
            <option value="2">U</option>
            </select> 

            <div class="col-6 mb-4 mt-2 mx-auto">
                <button class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Add new group</span>
                  </button>
                </div>
        </form>
      </div>
</div>



{{-- 
<section class="query-container">
    <div class="query-info">
        <h3 class="query-title">Add New Group</h3>
        <form action="/Groups" method="post" class="query-form addprof-form">
            @csrf
             <input type="text"  name="Name1" value="{{ old('Name')}}" placeholder="Group Type (L,U)">
            <select class="custom-select" id="inputGroupSelect01" name="Class_ID">
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
    </section> --}}


@endsection