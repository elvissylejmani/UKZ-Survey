@extends('layouts.newapp')
@section('content')
<section class="content-container">
    <article class="single-menu">
     <a href="surveys.html">Surveys<span><i class="fas fa-file-alt"></i></span></a>   
    </article>
    <article class="single-menu">
     <a href="managesurveys.html">Manage Surveys<span><i class="fas fa-file-alt"></i></span></a>   
    </article>
    <article class="single-menu">
     <a href="proffesors.html">Professors<span><i class="fas fa-chalkboard-teacher"></i></span></a>   
    </article>
    <article class="single-menu">
     <a href="subjects.html">Subjects<span><i class="fas fa-book"></i></span></a>   
    </article>
    <article class="single-menu">
     <a href="groups.html">Groups<span><i class="fas fa-users"></i></span></a>   
    </article>
    <article class="single-menu">
     <a href="users.html">Users<span><i class="fas fa-user"></i></span></a>   
    </article>
   </section>
{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded">
                <div class="card-header bg-primary text-white " style="text-align:center"><p class="h3"> Menyt </p></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <nav class="navbar navbar-expand-md navbar-info bg-white shadow-lg  mb-1">
                        <ul class="navbar-nav auto">
                        <li class="nav-item">
                    <a class="nav-link" href="/Survey">Shiko pyetesoret</a>
                    </li>
                        </ul>
                    </nav>
                        @if (Auth::user()->can('Admin'))
                            
                        <p class="h5">Sektori i Adminave:</p>
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-lg  mb-1">
                            <ul class="navbar-nav auto">
                            <li class="nav-item">
                                    <a href="/Survey/create">   <button type="submit" class="btn btn-primary">Pyetesore </button></a>
                        </li>
                            <li class="nav-item">
                                  <a href="/Professor">   <button type="submit" class="btn btn-primary ml-2">Profesorat</button></a>
                        </li>
                            <li class="nav-item">
                                    <a href="/Classes">   <button type="submit" class="btn btn-primary ml-2">Lendet mesimore</button></a>
                        </li>
                            <li class="nav-item">
                                    <a href="/Groups">   <button type="submit" class="btn btn-primary ml-2">Grupet mesimore</button></a>
                        </li>
                            <li class="nav-item">
                                    <a href="/Users">   <button type="submit" class="btn btn-primary ml-2">Perdoruesit</button></a>
                        </li>
                            </ul>
                            </div>
                            <ul class="navbar-nav auto ml-4 mb-4">
                                <div class="row">
                                    <div class="col-md-12">
                         <li class="nav-item">
                            <div class="custom-file">
                            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="import_file"   id="" required>
                                  <button  class="btn btn-info" type="submit">Shto te dhena me excel</button>
                                </form>
                              </div>
                         </li>
                            </ul>
                            </div>
                        </div>
                            </nav>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
