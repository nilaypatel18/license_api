<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InviteCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LogsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('adminauth');
    }
    public function index()
    {
        $logs = DB::select('SELECT * FROM activity_log');// DB::table('activity_log')->get();
        return view('admin.logsView', compact('logs'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy($id)
    {
        DB::table('activity_log')->where('id', $id)->delete();
        session()->flash('msg', 'Log Deleted');
        return back();
    }
}
