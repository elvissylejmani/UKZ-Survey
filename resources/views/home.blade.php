@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  mb-1">
                        <ul class="navbar-nav auto">
                        <li class="nav-item">
                    <a class="nav-link" href="/Survey">Shiko pyetesoret</a>
                    </li>
                        </ul>
                    </nav>
                        
                        <p class="h5">Sektori i Adminave:</p>
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  mb-1">
                            <ul class="navbar-nav auto">
                            <li class="nav-item">
                                
                                    <a href="/Survey/create">   <button type="submit" class="btn btn-primary"> Shto pyetesore </button></a>
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
