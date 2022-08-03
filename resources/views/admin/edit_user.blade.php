@extends('layouts.admin')
@section('content')
	<div class="edituser-formwrap mb-5">
        <h4 class="text-center mb-3">Edit User: {{ $user->email }}</h4>
        @if(session('msg'))
            <div class="alert alert-success" role="alert">
            <strong>{{session('msg')}}</strong>
            </div>
        @endif
        <form id="edit-form-{{$user->id}}" method=
        "post" action="{{ route('users.update', $user->id ) }}" class="formfild">
            @csrf
            @method('PUT')
            <!-- <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
            </div>
            <div class="alert alert-danger" role="alert">
                <h5>Ops!</h5>
                Your account has been suspended.
            </div>	-->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edusername" value="{{ $user->email }}" placeholder="Username" style="pointer-events:none">
                <label for="edusername" >Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="edpassword" placeholder="Password (if yo do not change it please leave empty)" style="pointer-events:none">
                <label for="edpassword">Password (if yo do not change it please leave empty)</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="edlicensecount"  id="edlicensecount" value="{{ $user->api_key_limit }}" placeholder="License Count">
                <label for="edlicensecount">License Count</label>
            </div>
            <p class="text-success"><strong>Note: Its max number to user can generate license keys for api. now there are <span class="text-danger">{{ $user->api_key_limit }}</span> license api keys in the user</strong></p>
            <div class="d-grid gap-2 col-8 mx-auto">						
                <input type="submit" class="btn btn-primary btn-lg" value="Update!" />
            </div>
        </form>
    </div>
    <hr />
    <div class="allapikeys-wrap mt-5 mb-5">
        <div class="d-flex mb-4 align-items-center justify-content-center flex-wrap">
            <h4 class="text-center mb-0">{{ $user->email }}'s API KEYS</h4>
        </div>
        @if($user->licensekeys->isNotEmpty())
        <div class="table-responsive">
            <table id="allapikeys" class="table allapikeys-tabel table-dark table-striped" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">API Key</th>
                    <th class="th-sm">Registered UUID</th>
                    <th class="th-sm">Action(s)</th>		      
                </tr>
                </thead>
                <tbody>
                @foreach($user->licensekeys as $key)
                <tr>
                    <td>{{ $key->api_key }}</td>
                    <td>1GDGDH-S2CTH-214NVN-HNGNNJGNGMD24F</td>
                    <td>
                        <button type="button" class="btn btn-primary"  
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{$key->id}}').submit();">
                        Delete 
                        </button>
                        <form id="delete-form-{{$key->id}}"  action="{{route('licenseapi.destroy', $key->id)}}"
                            method="post">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr> 
                @endforeach
                
                </tbody>
            </table>
        </div>
        @else
             <div class="alert alert-info" role="alert">
                There is no API Key generated.
            </div>
        @endif
    </div>

    <hr />

    <div class="lastlogs-wrap mt-5">
        <div class="d-flex mb-4 align-items-center justify-content-center flex-wrap">
            <h4 class="text-center mb-0">Logs which contanins "samet16"</h4>
        </div>
        @if($user->userLogs->isNotEmpty())
            <div class="table-responsive">
                <table id="logtextaction" class="table logtext-tabel table-dark table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Log Text</th>
                        <th class="th-sm">Action(s)</th>		      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($user->userLogs as $log)
                        <tr>
                            <td>{{ strip_tags($log->description)}}  Date: <span class="text-success">{{ $log->created_at }}</span></td>
                            <td>
                                
                                <button type="button" class="btn btn-primary"  
                                onclick="event.preventDefault(); document.getElementById('delete-log-{{$log->id}}').submit();">
                                 Delete 
                                </button>
                                <form id="delete-log-{{$log->id}}"  action="{{route('activitylogs.destroy', $log->id)}}"
                                    method="post">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                There is no Log.
            </div>
        @endif
    </div>
@endsection