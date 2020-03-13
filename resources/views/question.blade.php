@extends('layouts.newapp')

@section('content')


<section class="take-survey-container">
        
    <div class="questions">
        {{-- <form action=""> --}}
            <fieldset>
                <legend style="text-align: center;">{{$sr->class->Name ?? ''}} | {{$sr->Professor->Name }} {{$sr->Professor->LastName ?? ''}}</legend>
           @foreach ($questions as $question)
           <form action="/Answer" method="post">
            @csrf
                <article class="single-question">
                   <p>{{$question->question}}</p>
                   <div class="options">
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="1" id=""><label for="">1</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="2" id=""><label for="">2</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="3" id=""><label for="">3</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="4" id=""><label for="">4</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="5" id=""><label for="">5</label></div>
                       <input type="hidden" name="Question_ID[]" value="{{$question->id}}"> 
                   </div>
               </article>
               @endforeach
           
               <input type="submit" value="Submit" class="submit-survey">
</form>
            </fieldset>
       
       </form>
    </div>
  </section>













{{-- 
<div class="container">
    @foreach ($questions as $question)
    <form action="/Answer" method="post">
        @csrf
    <div class="row">
        <div class="col-12 mb-4">
                <nav class="navbar navbar-md navbar-light bg-primary shadow-sm align-start border border-primary rounded ">
                 <p class="h4 text-break"> {{$question->question}} </p>
                 <div class="input-group ">
                          <div class="input-group-text rounded w-100 p-3">
                              <div class="mx-auto">
                           1 <input type="radio" class="ml-4 mr-4 " value="1" name="Answer[]{{$question->id}}">
                           2 <input type="radio" class="ml-4 mr-4 " value="2" name="Answer[]{{$question->id}}">
                           3 <input type="radio" class="ml-4 mr-4 " value="3" name="Answer[]{{$question->id}}">
                           4 <input type="radio" class="ml-4 mr-4 " value="4" name="Answer[]{{$question->id}}">
                           5 <input type="radio" class="ml-4 mr-4 " value="5" name="Answer[]{{$question->id}}">
                            <input type="hidden" name="Question_ID[]" value="{{$question->id}}"> 
                        </div>
                        </div>
                      </div>
                </nav>
        </div>
    </div>
    @endforeach
    <button type="submit">Submit</button>
   


</div> --}}
@endsection