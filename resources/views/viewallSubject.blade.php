@extends('layouts.index')
@section('content')

<div class="row">
@foreach ($Classes as $class)
    
<div class="col-md-6">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Professor:</h6>
    </div>
    <div class="card-body">
        <h4 class="survey-subject"></span></h4>
        <h4 class="survey-subject"><span>{{$class->Name}} </span></h4>
    </div>

    <div class="row">
        <div class="col-3 ml-3 mb-2  ">
        <a href="/Classes/{{$class->id}}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">Modify</span>
          </a>
        </div>

        <div class="col-3  ">
            <form action="/Classes/{{$class->id}}" method="POST">
                @csrf
            @method('DELETE')
        <button class="btn btn-danger btn-circle">
            <span class="icon text-white-50">
              <i class="fas fa-trash"></i>
            </span>
        </button>
            </form>
        </div>

    </div>
    </div>
</div>
@endforeach

</div>


    {{-- <article class="single-survey">
     <h3 class="survey-subject">Subject:<span>{{$class->Name}}</span></h3>
     <div class="survey-action">
     <a href="/Classes/{{$class->id}}" class="survey-modify">Modify</a>
    </div>
    <form action="/Classes/{{$class->id}}" method="POST">
        @csrf
        @method('DELETE')
     <button class="delete-survey" title="Delete Subject"><i class="fas fa-times"></i></button>  
    </form>
    </article>
    
    --}}
   



@endsection