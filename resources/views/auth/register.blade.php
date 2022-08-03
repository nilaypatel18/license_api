@extends('layouts.app')

@section('content')

<div class="loginregister-formwrap">
        <h4 class="text-center mb-3">Register</h4>
        <form method="post" action="{{ route('register') }}" class="formfild">
            @csrf
            <!-- <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
            </div>
            <div class="alert alert-danger" role="alert">
                <h5>Ops!</h5>
                Your account has been suspended.
            </div>	 -->
            <input type="hidden" name="ip_address" value="{{ $_SERVER['REMOTE_ADDR'] }}"/>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email"  id="email" placeholder="email">
                <label for="email">Username</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password"  id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <label for="password-confirm">Confirm Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="invite_code" id="invite_code" placeholder="Invite code">
                <label for="invite_code">Invite code</label>
                @if($errors->any())
                  <h4>{{$errors->first()}}</h4>
                @endif
            </div>
            <div class="d-grid gap-2 col-8 mx-auto">
                <a href="javascript:void(0);" class="btn telegram-btn">
                    <i class="fa fa-telegram"></i> Get Invite code via Telegram
                </a>
                <input type="submit" class="btn btn-primary btn-lg" value="Register!" />
            </div>
        </form>
</div>
@endsection
