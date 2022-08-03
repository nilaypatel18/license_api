@extends('layouts.app')

@section('content')
<div class="getapikey-div">
    <h2>Get your API key</h2>
    <p>here is your description</p>
    <div class="apilogin-btn">
        <a href="{{ route('login' )}}" class="btn btn-primary btn-lg">
            Login / Register
        </a>
        <a href="#" class="btn telegram-btn">
            <i class="fa fa-telegram"></i> Contact via Telegram
        </a>
    </div>
</div>
@endsection