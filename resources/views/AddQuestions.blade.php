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
                      <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                  </div> --}}
        <input id="my_input" class="form-control" name="test1" type="text" value="">
    
    <button data-toggle="modal" data-target="#myModal" id="add_input1" name="" type="button" onclick="add_inputboxes()">GO</button>
    </div>
<div class="col"></div>        
</div>
<div class="row">
    <div class="col"></div>
    <form action="/Question" method="post">
        @csrf
        <div class="col col-md-6">
    <p>The Buttons go in #rolonum :</p>
    <div id="rolonum"></div>
<script>  
    
    function add_inputboxes() {
  n = $('#my_input').val();
  if (n < 1)
    alert("ERROR: Enter a positive number");
  else {
    $("#rolonum").html('');
    for (var i = 1; i <= n; i++) {
      $("#rolonum").append('<p><span>Item ' + i + ' </span><input id="rolo_add' + i + '" name="Questions[]"  type="text" value="" required/></p>');
    }
  }
}

</script>
<button type="submit">submit</button>
        </div>
</form>
<div class="col"></div>
</div>
</div>
@endsection
