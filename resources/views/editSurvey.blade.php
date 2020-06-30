@extends('layouts.index')
@section('content')
<div class="row">
    <div class="col-4">
    <div class="card shadow mb-4">
        <form action="/Question/{{$survey->id}}/Survey" method="post" class="query-form">
            @csrf
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add new Questions</h6>
        </div>
        <div class="card-body">
          <div class="input-group mb-3 mt-3">
            <input type="text" id="questionnumber" class="form-control" placeholder="Question Number" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" type="button" id='addquestion'>Add</button>
            </div>
          </div>
          <div class="questions" id="questions">
                       
          </div>
          <div class="col-6 mb-1 mx-auto">
            <button class="btn btn-success btn-icon-split" type="submit">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Add </span>
              </button>
            </div>
        </form>
        </div>
      </div>
      
    </div>  


    <div class="col-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Update Survey title</h6>
            </div>
            <div class="card-body">
                <form action="/Survey/{{$survey->id}}" method="POST" class="query-form">
                <input type="text" name="SurveyTitle" value="{{ $survey->SurveyTitle}}" class="form-control" placeholder="Survey Title" >
                @csrf
                @method("PATCH")
                <div class="col-6 mb-1 mt-2 mx-auto">
                    <button class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Update </span>
                      </button>
                    </div>
                </form>
            </div>
          </div>
          
        </div>  
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Update Survey questions</h6>
                </div>
                <div class="card-body">
                    <form action="/Question/{{$survey->id}}" method="POST" class="query-form">
                        @csrf
                        @method('PATCH')
                    @foreach ($survey->questions as $question)

                    
                    <div class="input-group mb-3 mt-3">
                        
                        <input type="text" value="{{$question->question}}" name="question[]"  class="form-control" placeholder="Question" >
                        <div class="input-group-append">
                            <a href="/Question/{{$question->id}}/delete" data-token="{{ csrf_token() }}" class="btn btn-danger btn-circle">
                                <span class="icon text-white-50">
                                  <i class="fas fa-trash"></i>
                                </span>
                            </a>
                        </div>
                      </div>
                      <input type="hidden" name="id[]" value="{{$question->id}}">

                    @endforeach
                    <div class="col-6 mb-1 mt-2 mx-auto">
                        <button class="btn btn-success btn-icon-split" type="submit">
                            <span class="icon text-white-50">
                              <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Update </span>
                          </button>
                        </div>
                    </form>
                </div>
              </div>
              
            </div> 
</div>


{{-- <section class="query-container">
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
              
               
        <h3 class="query-title update-survey-title">Update Survey Title</h3>
        <form action="/Survey/{{$survey->id}}" method="POST" class="query-form">
            @csrf
            @method('PATCH')
            <div class="question-number">
            <input type="text" value="{{$survey->SurveyTitle}}" name="SurveyTitle" placeholder="Questions number" id="questionnumber">
            <button type="submit" id='addquestion'>Save</button>
         </form>
    </div> --}}
    {{-- <div class="query-info update-survey">
         <form action="/Question/{{$survey->id}}" method="POST" class="query-form">
             @csrf
             @method('PATCH')
             <h3 class="query-title">Update Survey questions</h3>
             <div class="question-number">
                @foreach ($survey->questions as $question)
             <div class="edit-questions" id="edit-questions">
                <input type="text" value="{{$question->question}}" name="question[]" placeholder="Survey Title" class="question-value" >
                <a href="/Question/{{$question->id}}/delete" data-token="{{ csrf_token() }}" class="delete-question"> <i class="fas fa-times"></i> </a>
                <input type="hidden" name="id[]" value="{{$question->id}}">
            </div>
            @endforeach
        </div>
        
        <input type="submit" value="Save" class="save-survey-update">
    </form>
         </div> --}}

    {{-- </section> --}}





@endsection


@section('script')
<script type="text/javascript" src="{{ URL::asset('js/addquestion.js') }}"></script>
@endsection
