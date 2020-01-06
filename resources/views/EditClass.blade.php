@extends('layouts.app')
@section('content')
    


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

<div class="row">
<div class="col-lg-12">
<nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
    <ul class="navbar-nav auto">
        @forelse ($class->Professors as $prof)
        <form action="/Classes/{{$prof->id}}/edit">
            <li> <p class="h4"> {{$prof->Name}} {{$prof->LastName}}
                 <button onClick="return confirm('A jeni i sigurt se deshironi ta fshini kete te dhenen?')" type="submit" class="btn btn-danger">
                    <i class="fas fa-minus-circle"></i> 
            </button> 
        </p>
        </li>
        </form>
            @empty
            <p class="h2">Kjo lend nuk ka as nje profesor</p>
        @endforelse
    </ul>
<div class="col-sm-4">
    <form action="/Classes/{{$class->id}}/addprof" method="POST">
        @csrf
        <div class="input-group">
        <select class="custom-select" name="prof" searchable="Search here.." required>
            <option value="" disabled selected>Shto profesora ne kete lend</option>
            @foreach ($professor as $prof)
               @if (!in_array($prof->id,$classprof))
                   
            <option value="{{$prof->id}}">{{$prof->Name}} {{$prof->LastName}}</option>
            @endif 

            @endforeach
        </select>
        <div class="input-group-append">
            <button class="btn btn-info" type="submit">Shto</button>
        </div>
    </div>
</form>
</div>
</nav>  
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


</div>









@endsection


