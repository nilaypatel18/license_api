<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Str;

class SettingController extends Controller
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
        $settings =  Settings::all();
        return view('admin.settings', compact('settings'));
    }
    public function change_setting()
    {
        $settings = Settings::all();
        foreach($settings as $setting)
        {
            $settings = Settings::find($setting->id);
            if(isset($_REQUEST[$setting->key]))
                $setting->value = $_REQUEST[$setting->key];
            $setting->save();
        }
        session()->flash('msg', 'Settings Changed Successfully');
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
