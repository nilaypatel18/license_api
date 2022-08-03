<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InviteCode;
use Illuminate\Support\Str;

class InviteCodeController extends Controller
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
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invitecodes =  InviteCode::paginate(5);
        return view('admin.inviteCode', compact('invitecodes'));
    }
    public function create()
    {
        $code = Str::random(15);
        InviteCode::create([
            'invite_code' => $code,
        ]);
        session()->flash('msg', 'Invite Code Created');
        return back();
    }
    public function destroy($id)
    {
        $invitecode = InviteCode::find($id);
        $invitecode->delete();
        session()->flash('msg', 'Invite Code Deleted');
        return back();
    }
}
