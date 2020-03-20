@extends('layouts.newapp')
@section('content')
<section class="query-container">
    <div class="query-info">
    <form action="/Question/{{$survey->id}}/Survey" method="post" class="query-form">
       @csrf
 
                 <h3 class="query-title">Add questions</h3>
                 <div class="question-number">
                 <input type="text" placeholder="Questions number" id="questionnumber">
                 <button type="button" id='addquestion'>Add</button>
                 </div>
                 <div class="questions" id="questions">
                    
                 </div>
                     <input type="submit" value="Add">
                   </form>
<<<<<<< HEAD
              
               
        <h3 class="query-title update-survey-title">Update Survey Title</h3>
=======
        <h3 class="query-title">Update Survey Title</h3>
>>>>>>> 35e256b652a2c21ed6213b90189511e6dbbfe0bd
        <form action="/Survey/{{$survey->id}}" method="POST" class="query-form">
            @csrf
            @method('PATCH')
            <div class="question-number">
            <input type="text" value="{{$survey->SurveyTitle}}" name="SurveyTitle" placeholder="Questions number" id="questionnumber">
            <button type="submit" id='addquestion'>Save</button>
         </form>
<<<<<<< HEAD
    </div>
    <div class="query-info update-survey">
=======
>>>>>>> 35e256b652a2c21ed6213b90189511e6dbbfe0bd
         <form action="/Question/{{$survey->id}}" method="POST" class="query-form">
             @csrf
             @method('PATCH')
             <h3 class="query-title">Update Survey questions</h3>
         <div class="question-number">
                @foreach ($survey->questions as $question)
            <div class="questions" id="questions">
                <input type="text" value="{{$question->question}}" name="question[]" placeholder="Survey Title" >
                <input type="hidden" name="id[]" value="{{$question->id}}">
            </div>
            @endforeach
        </div>
        
        <input type="submit" value="Save">
    </form>
         </div>

    </section>





@endsection


@section('script')
<script type="text/javascript" src="{{ URL::asset('js/addquestion.js') }}"></script>
@endsection
