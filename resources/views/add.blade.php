@extends('layouts.index')

@section('content')
<form action="/Professor" method="post" class="query-form">
    @csrf
    <div class="card shadow mb-4 border-left-primary">
      <div class="card-header py-3 mx-auto">
        <h3 class="m-0 font-weight-bold text-primary ">Create A Survey</h3>
      </div>
      <div class="card-body">
        <input type="text" name="Name" value="{{ old('Name')}}" class="form-control mb-2" placeholder="First Name" >
        <input type="text" name="LastName" value="{{ old('LastName')}}" class="form-control mb-2" placeholder="Last Name" >
       
        <div class="col-6 mb-4 mx-auto">
            <button class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Add Professor</span>
              </button>
            </div>
      </div>
    </div>
</form>




@endsection