@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($questions as $question)
    <form action="/Question" method="post">
        @csrf
    <div class="row">
        <div class="col-12 mb-4">
                <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                 <p class="h4 text-break"> {{$question->question}} </p>
                 <div class="input-group ">
                          <div class="input-group-text rounded w-100 p-3">
                              <div class="mx-auto">
                           1 <input type="radio" class="ml-4 mr-4 " value="1" name="vlera[]{{$question->id}}">
                           2 <input type="radio" class="ml-4 mr-4 " value="2" name="vlera[]{{$question->id}}">
                           3 <input type="radio" class="ml-4 mr-4 " value="3" name="vlera[]{{$question->id}}">
                           4 <input type="radio" class="ml-4 mr-4 " value="4" name="vlera[]{{$question->id}}">
                           5 <input type="radio" class="ml-4 mr-4 " value="5" name="vlera[]{{$question->id}}">
                        </div>
                        </div>
                      </div>
                </nav>
        </div>
    </div>
    @endforeach
    <button type="submit">Submit</button>
</form>
   


</div>
@endsection