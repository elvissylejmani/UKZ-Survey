@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-lg-12 mx-auto">
<div class="card mb-4 w-100 font-weight-bold text-primary border-left-primary shadow-lg ">
    <div class="card-header">
      Subject: {{$sr->class->Name ?? ''}} | Professor: {{$sr->Professor->Name  ?? ''}} {{$sr->Professor->LastName ?? ''}} | Group: {{$sr->Name ?? ''}}
    </div>
    
        
           @foreach ($questions as $question)
           <form action="/Answer" method="post">
            
            @csrf
                <div class="card-body" >
                   <p style="width: 100%">{{$question->question}}?</p>
                    
                  </div>
                   <div class="col-sm-6" required>
                    <div class="input-group-prepend ">
                       <div class="single-option mr-4 ml-4"><input type="radio" name="Answer[]{{$question->id}}" class="mr-1" value="1" id="" required><label for="">  1</label></div>
                       <div class="single-option mr-4"><input type="radio" name="Answer[]{{$question->id}}" class="mr-1" value="2" id="" required><label for="">2</label></div>
                       <div class="single-option mr-4"><input type="radio" name="Answer[]{{$question->id}}" class="mr-1" value="3" id="" required><label for="">3</label></div>
                       <div class="single-option mr-4"><input type="radio" name="Answer[]{{$question->id}}" class="mr-1" value="4" id="" required><label for="">4</label></div>
                       <div class="single-option mr-4"><input type="radio" name="Answer[]{{$question->id}}" class="mr-1" value="5" id="" required><label for="">5</label></div>
                       <input type="hidden" name="Question_ID[]" value="{{$question->id}}"> 
                       <input type="hidden" name="Prof_ID" value="{{$sr->Professor->id}}">
                       <input type="hidden" name="id" value="{{$id}}">
                    </div>
                   </div>
               @endforeach
           <div class="col-md-6 mx-auto mb-4">
               <button type="submit" class="btn btn-success btn-icon-split mt-4 mx-auto">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Submit survey</span>
            </button>
        </div>  
</form>
       
</div>
</div>
</div>

@endsection