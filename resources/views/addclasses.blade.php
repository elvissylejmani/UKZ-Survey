@extends('layouts.index')

@section('content')

        <form action="/Classes" method="POST" class="query-form addprof-form">
            @csrf
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 mx-auto">
                  <h3 class="m-0 font-weight-bold text-primary ">Add new Subject</h3>
                </div>
                <div class="card-body">
                    <input type="text" name="Name" value="{{ old('Name')}}" class="form-control mb-2" placeholder="Subject Name" >
                  
             
        <div class="col-6 mb-4 mx-auto">
            <button class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Add Subject</span>
              </button>
            </div>
                </div>
            </div>
        </form>
  


@endsection