@extends('layouts.newapp')

@section('content')
<section class="query-container">
    <div class="query-info">
        <h3 class="query-title">Update Professor</h3>
        <form action="/Professor/{{$professor->id}}" method="POST"  class="query-form addprof-form">
            @csrf
            @method('PATCH')
            <input type="text"  name="Name" value="{{$professor->Name}}">
            <input type="text"  name="LastName" value="{{$professor->LastName}}">
            <input type="submit" value="Save">
        </form>
    </div>
    </section>

{{-- 
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
    --}}

{{-- </div> --}}
@endsection
