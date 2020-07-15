@extends('layouts.index')

@section('content')
    

<div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Register students via excel:</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('import') }}" method="POST"  enctype="multipart/form-data" class="query-form addprof-form">
        @csrf
        <div class="custom-file">
        <input type="file" name="import_file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>  
        <div class="col-3 mt-2 ">
          
            <button class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-check"></i>
                </span>
                <span class="text">Insert students</span>
            </button>
        </div>
    </form>

      </div>
      </div>
    </div>
</div>

{{-- <section class="query-container">
    <div class="query-info">
        <h3 class="query-title" style="padding-left: 60px;">Upload data with excel file</h3>
        <form action="{{ route('import') }}" method="POST"  enctype="multipart/form-data" class="query-form addprof-form">
            @csrf
            <input type="file" name="import_file" placeholder="First Name" required>
            <input type="submit" value="Upload">
        </form>
    </div>
    </section> --}}


@endsection