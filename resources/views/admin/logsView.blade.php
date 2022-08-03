@extends('layouts.admin')
@section('content')

<div class="lastlogs-wrap">
    <div class="d-flex mb-4 align-items-center justify-content-center flex-wrap">
        <h4 class="text-center mb-0">Last 1000 Logs</h4> &nbsp;&nbsp;
        <a href="#" class="btn btn-primary">Delete All Logs</a>
    </div>
    <div class="table-responsive">
        <table id="logtextaction" class="table logtext-tabel table-dark table-striped" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">Log Text</th>
                <th class="th-sm">Action(s)</th>		      
            </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                  <tr>
                        <td>{{$log->log_name}}, {{ $log->description}}. IP: <span class="text-danger">{{$log->subject_type}}</span> Date: <span class="text-success">{{ $log->created_at }}</span></td>
                        <td>
                        <button  type="button" class="btn btn-primary"  
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{$log->id}}').submit();">
                        Delete 
                        </button>
                        <form id="delete-form-{{$log->id}}"  action="{{route('activitylogs.destroy', $log->id)}}"
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