@extends('layouts.index')

@section('content')


<div class="login">
    <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
        <div class="login-logo">
           <img src="{{ asset('img/logo.png') }}" alt=""> 
        </div>
        <div class="login-input-group">
            <label for="email">E-Mail</label>
            <input type="email" style="@error('email') border-color:red @enderror" name="email" id="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="login-input-group">
            <label for="password">Password</label>
            <input type="password" name="password"  style="@error('password') border-color:red @enderror" id="password" placeholder="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="remember-me">
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <label for="remember">  {{ __('Remember Me') }}</label>
        </div> 

        <input type="submit" value="Login">
        @if (Route::has('password.request'))
        <a class="forgot-password" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif

    </form>
</div>







@endsection
