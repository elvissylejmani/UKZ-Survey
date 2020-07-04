@extends('layouts.index')

@section('content')
<div class="card shadow mb-4 border-left-primary">
    <div class="card-header py-3 mx-auto">
      <h3 class="m-0 font-weight-bold text-primary ">Create A Survey</h3>
    </div>
    <div class="card-body">
        <form action="/Professor/{{$professor->id}}" method="POST"  class="query-form addprof-form">
            @csrf
            @method('PATCH')
            <input type="text" name="Name" value="{{$professor->Name}}" class="form-control mb-2" placeholder="First Name" >
            <input type="text" name="LastName" value="{{$professor->LastName}}" class="form-control mb-2" placeholder="Last Name" >
      
            <div class="col-6 mb-4 mx-auto">
                <button class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Update Professor</span>
                  </button>
                </div>
      
        </form>
    </div>

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
