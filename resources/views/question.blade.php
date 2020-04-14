@extends('layouts.newapp')

@section('content')


<section class="take-survey-container">
        
    <div class="questions">
            <fieldset>
                <legend style="text-align: center;">{{$sr->class->Name ?? ''}} | {{$sr->Professor->Name  ?? ''}} {{$sr->Professor->LastName ?? ''}}</legend>
           @foreach ($questions as $question)
           <form action="/Answer" method="post">
            @csrf
                <article class="single-question">
                   <p>{{$question->question}}</p>
                   <div class="options" required>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="1" id="" required><label for="">1</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="2" id="" required><label for="">2</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="3" id="" required><label for="">3</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="4" id="" required><label for="">4</label></div>
                       <div class="single-option"><input type="radio" name="Answer[]{{$question->id}}" value="5" id="" required><label for="">5</label></div>
                       <input type="hidden" name="Question_ID[]" value="{{$question->id}}"> 
                       <input type="hidden" name="Prof_ID" value="{{$sr->Professor->id}}">
                   </div>
               </article>
               @endforeach
           
               <input type="submit" value="Submit" class="submit-survey">
</form>
            </fieldset>
       
       </form>
    </div>
  </section>

@endsection