@extends('layouts.newapp')

@section('content')
    
<section class="query-container">
    <div class="query-info">
        <h3 class="query-title" style="padding-left: 60px;">Upload data with excel file</h3>
        <form action="{{ route('import') }}" method="POST"  enctype="multipart/form-data" class="query-form addprof-form">
            @csrf
            <input type="file" name="import_file" placeholder="First Name" required>
            <input type="submit" value="Upload">
        </form>
    </div>
    </section>


@endsection