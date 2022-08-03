@extends('layouts.admin')
@section('content')

<div class="setting-formwrap">
    <h4 class="text-center mb-3">Settings</h4>
    @if(session('msg'))
        <div class="alert alert-success" role="alert">
           <strong>{{session('msg')}}</strong>
        </div>
    @endif
    <form action="{{ route('settings.change') }}" method="Post" class="formfild">
        @csrf
        <!-- <div class="alert alert-success" role="alert">
            A simple success alert—check it out!
        </div>
        <div class="alert alert-danger" role="alert">
            <h5>Ops!</h5>
            Your account has been suspended.
        </div>	 -->

        @foreach($settings as $setting)
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="{{ $setting->key}}"  id="{{ $setting->key}}" placeholder="{{$setting->key}}" value="{{$setting->value}}">
            <label for="setelegramlink">{{$setting->key}}</label>
        </div>
        @endforeach
        <div class="d-grid gap-2 col-8 mx-auto">						
        <input type="submit" class="btn btn-primary btn-lg" value="Update!" />
    </div>
    </form>
</div>
@endsection                        