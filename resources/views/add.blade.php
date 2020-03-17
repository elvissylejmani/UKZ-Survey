@extends('layouts.newapp')

@section('content')
<section class="query-container">
    <div class="query-info">
        <h3 class="query-title">Add New Professor</h3>
        <form action="/Professor" method="post" class="query-form addprof-form">
            @csrf
            <input type="text" name="Name" placeholder="First Name">
            <input type="text" name="LastName" placeholder="Last Name">
            <input type="submit" value="Add">
        </form>
    </div>
    </section>
       



@endsection