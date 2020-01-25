@extends('layouts.app')

@section('content')



<div class="container">
        <form action="/Survey" method="post">

    <div class="row mb-4">
        <div class="col"></div>
        <div class="col col-md-8">
                <nav class="navbar navbar-md navbar-light bg-white shadow-sm align-start border border rounded">
                        @csrf
                        <p class="h3 text-center ml-4"> Shto Pyetesor</p>
                        <input type="text" name="SurveyTitle" value="{{ old('SurveyTitle')}}"  class="form-control mb-4 {{$errors->has('SurveyTitle') ? 'border border-danger' : ''}}" placeholder="Titulli i Pyetesorit" aria-label="Username" aria-describedby="basic-addon1"> 
                  <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input id="my_input" placeholder="Sa pyeteja ka ne pyetesor" class="form-control" name="test1" type="text" value="">
                        
                        <button data-toggle="modal" class="btn btn-outline-secondary" data-target="#myModal" id="add_input1" name="" type="button" onclick="add_inputboxes()">GO</button>
                                      </div>  
                                      <div class="col col-md-6" id="rolonum">
                                        <script>  
                                            
                                            function add_inputboxes() {
                                          n = $('#my_input').val();
                                          if (n < 1)
                                            alert("ERROR: Enter a positive number");
                                          else {
                                            $("#rolonum").html('');
                                            for (var i = 1; i <= n; i++) {
                                              $("#rolonum").append('<p><span>Item ' + i + ' </span><input id="rolo_add' + i + '" name="question[]"  class="form-control"  type="text" value="" required/></p>');
                                            }
                                          }
                                        }
                                        
                                        </script>
                                        </div>
                                    </div>
                        @if ($groups->isNotEmpty())
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                    <input type="checkbox" onClick="toggle(this)" />Selekto te gjith grupet <br/>
                </div>
            </div>
            @endif
                    @forelse($groups as $group)
                        
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                          <input type="checkbox" name="Group_ID[]" value="{{$group->id}}" aria-label="Checkbox for following text input">
                                Lenda: <b> 
                                                    
                                    {{$group->class->Name ?? ''}}

                                  </b>,   Groupi: <b> {{$group->Name ?? ''}} </b>,  Profesori: <b> {{$group->Professor->Name ?? ''}}  {{$group->Professor->LastName ?? ''}} </b>
                          </div>
                        </div>
                      </div>
                    @empty
                    <p class="h3">Nuk ka as edhe nje grup te liruar per pyetsor</p>
                         <p class="h5">Per krijimin e pyetsorve krijoni grupe te reja ose beni fshirjen e pyetsorve te vjeter</p>
                     @endforelse
                          
                          <button type="Submit" class="btn btn-primary">Shto</button>
                          @if ($errors->any())
                          <div class="col-md-12 mt-4">
                          <div class="alert alert-danger">
                              <ul class="navbar-nav auto">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                        </div>
                      @endif
                    </nav>

        </div>
        <div class="col"></div>

    </div>

</form>
</div>
<div class="container-fluid">
    <div class="row">
@foreach ($surveys as $survey)
<div class="col col-md-6 mb-4">
            <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                <form action="/Survey/{{$survey->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger"><i style=" " class="fas fa-times"></i></button>
            </form>
            <div class="col-md-11">
                    <ul class="navbar-nav auto">
                        </li class="nav-item">{{ $survey->id }}</li>
                        <li class="nav-item"><p class="h1">{{ $survey->SurveyTitle }} </p></li>
                    </ul>
                </div>
                        <div class="col-md-12">
                              <a href="/AddQuestions/{{$survey->id}}">  <button type="button"  class="btn btn-success btn-lg">Shto / Modifiko</button> </a>
                          
                    </div>
        </nav>  
        </div>
        @endforeach
        </div>
    </div>
</div>

@endsection
<script>
function toggle(source) {
  checkboxes = document.getElementsByName('Group_ID[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}

</script>


