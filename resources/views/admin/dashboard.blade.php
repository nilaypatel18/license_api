@extends('layouts.admin')
@section('content')
<div class="alluser-wrap">
        @error('msg')
        <div class="alert alert-danger" role="alert">
           {{$message}}
        </div> 
        @enderror
    <h4 class="text-center mb-4">All Users</h4>
    <div class="table-responsive">
        <table id="userapikey" class="table table-success table-striped" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">Username</th>
                <th class="th-sm">API Key Limit / Current</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Actions</th>							      
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @php($created = $user->licensekeys->count())
                    @php( $btn_status = ($user->status == 'Its works') ? 'Suspend' : 'Run')
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->api_key_limit }} / {{ $created}}  </td>
                        <td>{{ $user->status}}</td>
                        <td>
                        
                        <a href="{{ route('users.edit', $user)}}"  class="btn btn-success"  id="editurusan">Edit</a>

                        <button type="button" class="btn btn-danger"
                            onclick="event.preventDefault(); document.getElementById('update-status-{{$user->id}}').submit();">
                            {{ $btn_status }}
                        </button> - 
                        <button type="button" class="btn btn-primary" 
                            onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();">
                            Delete 
                        </button>
                      
                        <form id="update-status-{{$user->id}}" method="post" action="{{ route('users.update', $user->id)}}">
                            @csrf
                            @method('PUT')
                        </form>
                        <form id="delete-form-{{$user->id}}"  action="{{route('users.destroy', $user->id)}}"
                            method="post">
                            @csrf @method('DELETE')
                        </form>
                        </td>
                    </tr> 
                @endforeach
           
           
            </tbody>
        </table>
    </div>
</div>
@endsection