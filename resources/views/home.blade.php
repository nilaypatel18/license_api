@extends('layouts.app')
@section('content')
<div class="apipage-logintel mb-4">
        <ul class="d-flex align-items-center flex-wrap">
            <li>
                <a href="javascript:void(0);" class="btn telegram-btn">
                    <i class="fa fa-telegram"></i> Contact via Telegram
                </a>
            </li>
            <li>
            <a href="{{ route('changepassword.show')  }}">
                Change Password
            </a>
            </li>
        </ul>
    </div>
    <div class="myapikey-div">
        @error('msg')
        <div class="alert alert-danger" role="alert">
           {{$message}}
        </div> 
        @enderror
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <h5>Well done!</h5>
             Your api key was created!
            <br/>
            <hr/>
            API KEY: <strong>{{session('success')}}</strong>
        </div>
        @endif
        <h4 class="text-center mb-3">My API Keys</h4>
        @foreach($user->licensekeys as $key)
        <div class="myapikey-boxdiv text-bg-dark mb-3">
            <label class="form-label p-2">API Key</label>
            <div class="input-group p-2">
                <input type="text" class="form-control" placeholder="{{$key->api_key}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button id="button-addon2" type="button" class="btn btn-primary"  
                   onclick="event.preventDefault(); document.getElementById('delete-form-{{$key->id}}').submit();">
                 Delete 
                </button>
                <form id="delete-form-{{$key->id}}"  action="{{route('licenseapi.destroy', $key->id)}}"
                    method="post">
                    @csrf @method('DELETE')
                </form>
                
            </div>
        </div>
        @endforeach
        <h4 class="text-center"><a href="{{ route('licenseapi.create') }}">Create new one</a></h4>  
</div>

@endsection
