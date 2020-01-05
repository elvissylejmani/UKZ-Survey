@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded">
                <div class="card-header bg-primary " style="text-align:center"><p class="h3"> Menyt </p></div>

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
                        
                        <p class="h5">Sektori i Adminave:</p>
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-lg  mb-1">
                            <ul class="navbar-nav auto">
                            <li class="nav-item">
                                
                                    <a href="/Survey/create">   <button type="submit" class="btn btn-primary"> Shto pyetesore </button></a>
                        </li>
                            <li class="nav-item">
                           
                                  <a href="/Professor">   <button type="submit" class="btn btn-primary ml-2">Profesorat</button></a>
                                  
                        </li>
                            <li class="nav-item">
                                
                                    <a href="/Classes">   <button type="submit" class="btn btn-primary ml-2">Oret mesimore</button></a>
                        </li>
                            <li class="nav-item">
                                
                                    <a href="/Groups">   <button type="submit" class="btn btn-primary ml-2">Grupet mesimore</button></a>
                        </li>
                            </ul>
                            </nav>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
