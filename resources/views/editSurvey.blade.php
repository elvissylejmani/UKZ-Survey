@extends('layouts.newapp')
@section('content')
<section class="query-container">
    <div class="query-info">
        <h3 class="query-title">Update Survey</h3>
        <form action="" class="query-form">
            {{-- <input type="text" value="{{$survey->SurveyTitle}}" placeholder="Survey Title" > --}}
            <div class="question-number">
            <input type="text" value="{{$survey->SurveyTitle}}" placeholder="Questions number" id="questionnumber">
            <button type="button" id='addquestion'>Save</button>
         </div>
         <div class="question-number">
            @foreach ($survey->questions as $question)
            <div class="questions" id="questions">
                <input type="text" value="{{$question->question}}"  placeholder="Survey Title" >
            </div>
            @endforeach

        </div>
            <input type="submit" value="Save">
        </form>
    </div>
    </section>





@endsection