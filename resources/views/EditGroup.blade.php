@extends('layouts.index')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Students:</h6>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">ID</th>
    </tr>
  </thead>
  <tbody>
    @php $nr = 1; @endphp
    @for($i = 0; $i<count($Group->Students);$i++)
    <tr>
    <th scope="row">{{$nr++}}</th>
    <td>{{$Group->Students[$i]->name}}</td>
    <td>{{$Group->Students[$i]->lastname}}</td>
    <td>{{$Group->Students[$i]->id}}</td>
    </tr>
    @endfor
  </tbody>
</table>
</div>
  </div>
</div>

    
{{-- <section class="content">
  <section class="flex-container">
      
      <div class="students">
       <h3>Group: L1</h3>
       <ol class="students-list">
        @foreach ($Group->Students as $Stud)
           <li>
               <p>{{$Stud->name}} {{$Stud->lastname}} (ID: {{$Stud->id}})</p>
           </li>
           @endforeach
         </ol>
      </div>
  
  </section> --}}







{{-- <div class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <form action="/Groups/{{$Group->id}}" method="POST">
                @csrf
                @method('PATCH')
                <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
               <p class="h2">Modifiko Grupin</p>

                    <input type="text" name="Name" value="{{$Group->Name}}"  class="form-control mb-4 {{$errors->has('Name') ? 'border border-danger' : ''}}"  aria-label="Username" aria-describedby="basic-addon1"> 
                   <p class="h2">{{$Group->Class->Name}} </p>
                   <select class="custom-select mb-4" name="Class_ID" searchable="Search here..">
                    <option value="" disabled selected>shto lenden per kete grup</option>
                    @foreach ($classes as $class)
                    @if (!($Group->class->Name == $class->Name))
                    <option value="{{$class->id}}">{{$class->Name}}</option>
                    @endif
                    @endforeach
                </select>
               
                    <button type="Submit" class="btn btn-success">Modifiko</button>
                </nav>
            </form>
        </div>
       
        <div class="row">
          
          <div class="col-lg-6 ">
            <div class="card  text-white bg-primary" style="width: 35rem;" >
              <div class="card-header" >Profesoret</div>
              <div class="card-body" >
                @empty(!$Group->Professor)
                        {{$Group->Professor->Name}}
                        {{$Group->Professor->LastName}}
                @endempty
                      </div>
                    </div>
                  </div>

                <div class="col-sm-6">
                  <div class="card  text-white bg-success" style="width: 35rem;" >
                    <div class="card-header">Studentet</div>
                    <div class="card-body">
                        @foreach ($Group->Students as $Stud)
                      <p class="card-text">{{$Stud->name}} {{$Stud->lastname}} (ID: {{$Stud->id}})</p>
                    @endforeach  
                    </div>
                    <div class="card-footer">
                       <form action="/Groups/{{$Group->id}}/edit" method="GET">  
                       <div class="input-group">
                                                  <select class="custom-select" name="stud" searchable="Search here.." required>
                            <option value="" disabled selected>Shto student per ket lend</option>
                            @foreach ($Users as $User)
                               @if (!in_array($User->id,$grupuser))
                                   
                            <option value="{{$User->id}}">{{$User->name}}  {{$User->lastname}} {{$User->id}}</option>
                            @endif 
                
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit" >Shto</button>
                        </div>
                    </div>
                </form>

                    </div>
                  </div>
                </div>
              </div>
    </div> --}}



















@endsection