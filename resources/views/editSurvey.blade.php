@extends('layouts.newapp')
@section('content')
<section class="query-container">
    <div class="query-info">
        <h3 class="query-title">Update Survey</h3>
        <form action="" class="query-form">
            <input type="text" placeholder="Survey Title" >
            <div class="question-number">
            <input type="text" placeholder="Questions number" id="questionnumber">
            <button type="button" id='addquestion'>Add</button>
         </div>
            <div class="questions" id="questions">
               
            </div>
            <div class="select-groups">
               <div><input type="checkbox" id='select-all'> <label for="">Select All Groups</label></div> 
               <div><input type="checkbox" class='select-group'> <label for="">Group 1</label></div> 
               <div><input type="checkbox" class='select-group'> <label for="">Group 2</label></div> 
               <div><input type="checkbox" class='select-group'> <label for="">Group 3</label></div> 
               <div><input type="checkbox" class='select-group'> <label for="">Group 4</label></div> 
              
            </div>
            <input type="submit" value="Save">
        </form>
    </div>
    </section>





@endsection