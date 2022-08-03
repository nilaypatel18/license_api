@extends('layouts.admin')
@section('content')

<div class="allinvitecodes-wrap">
    @error('msg')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div> 
    @enderror
    @if(session('msg'))
        <div class="alert alert-primary" role="alert">
           <strong>{{session('msg')}}</strong>
        </div>
    @endif
    <div class="d-flex mb-4 align-items-center justify-content-center flex-wrap">
        <h4 class="text-center mb-0">All Invite Codes</h4> &nbsp;&nbsp;
        <a href="{{ route('invitecodes.create') }}" class="btn btn-primary">Generate New</a>
    </div>
    <div class="table-responsive">
        <table id="allinvitecodes" class="table invitecodes-tabel table-dark table-striped" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">Invite Code</th>
                <th class="th-sm">Action(s)</th>		      
            </tr>
            </thead>
            <tbody>
                @foreach($invitecodes as $invitecode)
                <tr>
                    <td>{{ $invitecode->invite_code }}</td>
                    <td>
                      <button  type="button" class="btn btn-primary"  
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{$invitecode->id}}').submit();">
                        Delete 
                        </button>
                        <form id="delete-form-{{$invitecode->id}}"  action="{{route('invitecodes.destroy', $invitecode->id)}}"
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