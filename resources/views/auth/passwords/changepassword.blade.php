@extends('layouts.app')
@section('content')

<div class="loginregister-formwrap">
        <h4 class="text-center mb-3">Change Password</h4>
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
          {{$errors->first()}}
        </div> 
        @endif
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{session('success')}}</strong>
        </div>
        @endif
        <form method="post" action=" {{ route('changePassword') }}" class="formfild">
        @csrf
            <div class="form-floating mb-3">
                <input type="password" name="current-password" class="form-control" id="current-password" placeholder="Current Password">
                <label for="current-password">Current Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="new-password" name="new-password" placeholder="New Password">
                <label for="new-password">New Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirmed" name="confirmed" placeholder="New Password (again)">
                <label for="confirmed">New Password (again)</label>
            </div>												
            <div class="d-grid gap-2 col-8 mx-auto">									
                <input type="submit" class="btn btn-primary btn-lg" value="Change!" />
            </div>
        </form>
</div>
@endsection