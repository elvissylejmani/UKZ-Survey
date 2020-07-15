@extends('layouts.index')

@section('content')
    

<div class="row">
    @foreach ($Groups as $Group)
    <div class="col-md-6">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Group:</h6>
        </div>

        <div class="card-body">
            <h4 class="survey-subject"></span></h4>
            <h4 class="survey-subject"><span>Group: {{$Group->Name}} </span></h4>
            <h3 class="survey-subject">Subject:<span> {{ $Group->Class->Name ?? '' }}</span></h3>
            <h3 class="survey-subject">Professor:<span> {{ $Group->Professor->Name ?? '' }} {{ $Group->Professor->LastName ?? '' }}</span></h3>
        </div>
        <div class="row">
        <div class="col-3 ml-3 mb-2  ">
            <a href="/Groups/{{$Group->id}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Students </span>
              </a>
            </div>

            <div class="col-3  ">
                <form action="/Groups/{{$Group->id}}" method="POST">
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



{{-- <section class="content-container">
    
    @foreach ($Groups as $Group)
    <article class="single-survey">
     <h3 class="survey-subject">Group:<span>{{ $Group->Name ?? ''}}</span></h3>
     <h3 class="survey-subject">Subject:<span>{{ $Group->Class->Name ?? '' }}</span></h3>
     <h3 class="survey-subject">Professor:<span>{{ $Group->Professor->Name ?? '' }} {{ $Group->Professor->LastName ?? '' }}</span></h3>
     <div class="survey-action">
     <a href="/Groups/{{$Group->id}}" class="survey-modify">View</a>
    </div>
    <form action="/Groups/{{$Group->id}}" method="POST">
        @csrf
        @method('DELETE')
     <button class="delete-survey" title="Delete Group"><i class="fas fa-times"></i></button>  
    </form>
    </article> --}}

    
    {{-- @endforeach --}}




@endsection