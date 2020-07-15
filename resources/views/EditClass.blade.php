@extends('layouts.index')
@section('content')
    
<div class="card shadow mb-4 border-left-primary">
    <div class="card-header py-3 mx-auto">
      <h3 class="m-0 font-weight-bold text-primary ">Edit data for this professor</h3>
    </div>
    <div class="card-body">
        <form action="/Classes/{{$class->id}}" method="POST" class="query-form addprof-form">
            @csrf
            @method('PATCH')
            <input type="text" name="Name" value="{{$class->Name}}" class="form-control mb-2" placeholder="Subject Name" >
          
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
            <form action="/Classes/{{$class->id}}" method="POST">
                @csrf
                @method('PATCH')
                <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                <p class="h2">Modifiko emrin e lendes</p>

                    <input type="text" name="Name" value="{{$class->Name}}"  class="form-control mb-4 {{$errors->has('Name') ? 'border border-danger' : ''}}"  aria-label="Username" aria-describedby="basic-addon1"> 
                    <button type="Submit" class="btn btn-success">Modifiko</button>
                </nav>
            </form>
        </div>
    </div>




<div class="row mt-4">
    <div class="col-lg-12">
        <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
            <ul class="navbar-nav auto">
                @foreach ($class->Groups as $group)
                <form action="/Groups/{{$group->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <li> <p class="h4"> {{$group->Name}}
                         <button onClick="return confirm('A jeni i sigurt se deshironi ta fshini kete te dhenen?')" type="submit" class="btn btn-danger">
                            <i class="fas fa-minus-circle"></i> 
                    </button> 
                </p>
                </li>
                </form>
                @endforeach
            </ul>
            <form action="/Groups" method="POST">
                @csrf
                <div class="input-group">
                    <input id="" placeholder="Emri i grupit" class="form-control" name="Name1" type="text" value="">
                    <button  class="btn btn-info" data-target="" id="" name="" type="submit" >Shto</button>
                        <input type="hidden" name="Class_ID" value="{{$class->id}}">
                </div>
            </form>

        </nav>
    </div>

 
</div> --}}









@endsection


