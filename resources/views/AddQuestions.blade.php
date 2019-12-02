@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <div class="col"></div>
    <div class="col col-md-6"> 
            {{-- <div class="input-group mb-3">
                    <input type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <span  id="basic-addon2">@example.com</span>
                    </div>
                  </div> --}}
                  <div class="input-group mb-3">
        <input id="my_input" placeholder="Sa pyeteja ka ne pyetesor" class="form-control" name="test1" type="text" value="">
    
    <button data-toggle="modal" class="btn btn-outline-secondary" data-target="#myModal" id="add_input1" name="" type="button" onclick="add_inputboxes()">GO</button>
                  </div>   
</div>
<div class="col"></div>        
</div>
<form action="/Question" method="post">
    @csrf
        <div class="row">
        <div class="col"></div>
    <div class="col col-md-6" id="rolonum">
<script>  
    
    function add_inputboxes() {
  n = $('#my_input').val();
  if (n < 1)
    alert("ERROR: Enter a positive number");
  else {
    $("#rolonum").html('');
    for (var i = 1; i <= n; i++) {
      $("#rolonum").append('<p><span>Item ' + i + ' </span><input id="rolo_add' + i + '" name="question[]"  class="form-control"  type="text" value="" required/></p>');
    }
    $("#rolonum").append('<button class="btn btn-info" type="submit">submit</button>');
  }
}

</script>
</div>
<div class="col"></div>
</div>
<div class="row">
    <div class="col"></div>
<div class="col"> </div>
<div class="col"></div>
</div>
<input type="hidden" name="Survey_ID" value="{{$id}}">
</form>
</div>
@endsection
