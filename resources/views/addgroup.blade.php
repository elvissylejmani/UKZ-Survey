@extends('layouts.newapp')

@section('content')


<section class="query-container">
    <div class="query-info">
        <h3 class="query-title">Add New Group</h3>
        <form action="" class="query-form addprof-form">
            <input type="text" placeholder="Group Type (L,U)">
            <select class="select-style">
             <option value="" selected disabled>Choose Subject</option>
         </select>
            <select class="select-style">
                <option value="" selected disabled>Choose Professor</option>
            </select>
            

            <input type="submit" value="Add">
        </form>
    </div>
    </section>


@endsection