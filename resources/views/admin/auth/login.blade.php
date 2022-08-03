@extends('layouts.admin')

@section('content')

<div class="loginregister-formwrap">
       <!-- <div class="register-textdiv">
            <h4 class="text-center mb-3">Do not have account?</h4>
            <div class="d-grid gap-2">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-dark">
                    Register!
                </a>
            </div>
        </div>-->
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
          <h5>Ops!</h5>
          <strong>{{session('error')}}</strong>
        </div>
        @endif
        <h4 class="text-center mb-3">Login</h4>
        <form  class="formfild" method="POST" action="{{ route('adminLoginPost') }}">
            @csrf
            <!-- <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
            </div> -->
            <!--<div class="alert alert-danger" role="alert">
                <h5>Ops!</h5>
                Your account has been suspended.
            </div> -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email" id="email" placeholder="Username">
                <label for="email">{{ __('Email Address') }}</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="password">{{ __('Password') }}</label>
            </div>
            <div class="form-floating mb-3">
                <input type="checkbox" name="remember" id="remember" >   {{ __('Remember Me') }}
                
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif							
            <div class="login-btndiv">						
                <input type="submit" class="btn btn-primary btn-lg" value="Login!" />
            </div>
        </form>
    </div>
</div>


@endsection
